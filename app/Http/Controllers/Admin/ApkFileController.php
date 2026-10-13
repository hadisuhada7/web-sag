<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApkFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApkFileController extends Controller
{
    // Upload size limit: 100 MB (in KB, following Laravel's "max" rule).
    const MAX_SIZE_KB = 102400;

    // The APK file is stored in storage/app/apk (not directly accessible from the web,
    // only via the public download route).
    const DIR = 'apk';

    public function list()
    {
        return view("admin.apk", [
            'list' => ApkFile::orderByDesc('release_date')->orderByDesc('id')->get()
        ]);
    }

    public function get($id)
    {
        $id = decrypt($id);
        $apk = ApkFile::where('id', $id)->first();

        if (!$apk) {
            return $this->fail("Data tidak ditemukan.");
        }

        return response()->json([
            'code' => 200,
            'msg'  => "",
            'data' => [
                'app_name'     => $apk->app_name,
                'version'      => $apk->version,
                'release_date' => $apk->release_date->format('Y-m-d'),
                'file_name'    => $apk->file_name,
                'publish'      => $apk->publish ? 1 : 0,
            ]
        ]);
    }

    public function save(Request $request)
    {
        $id = $request->input("id");
        if ($id) {
            $id = decrypt($id);
        }

        $validator = Validator::make($request->all(), [
            'app_name'     => 'required|string|max:100',
            'version'      => 'required|string|max:50',
            'release_date' => 'required|date',
        ], [
            'app_name.required'     => 'Nama aplikasi wajib diisi.',
            'version.required'      => 'Versi wajib diisi.',
            'release_date.required' => 'Tanggal release wajib diisi.',
            'release_date.date'     => 'Tanggal release tidak valid.',
        ]);

        if ($validator->fails()) {
            return $this->fail($validator->errors()->first());
        }

        $apk = null;
        if ($id) {
            $apk = ApkFile::where('id', $id)->first();
            if (!$apk) {
                return $this->fail("Data tidak ditemukan.");
            }
        }

        $file = $request->file('apk');

        // The file is mandatory when adding a new entry; it can be left blank when editing (the existing file will be used).
        if (!$apk && !$file) {
            return $this->fail("File APK wajib diupload. (Jika sudah dipilih, ukuran mungkin melebihi batas server.)");
        }

        $form = [
            'app_name'     => trim($request->input('app_name')),
            'version'      => trim($request->input('version')),
            'release_date' => $request->input('release_date'),
            'publish'      => $request->input('publish') == "1" ? 1 : 0,
        ];

        $newPath = null;

        if ($file) {
            if (!$file->isValid()) {
                return $this->fail("Upload gagal: " . $file->getErrorMessage());
            }

            if (strtolower($file->getClientOriginalExtension()) !== 'apk') {
                return $this->fail("Ekstensi file harus .apk");
            }

            if ($file->getSize() > self::MAX_SIZE_KB * 1024) {
                return $this->fail("Ukuran file maksimal 100 MB.");
            }

            // An APK is a ZIP archive; check for the "PK\x03\x04" signature so that other files
            // merely renamed to .apk do not pass the check.
            $handle = fopen($file->getRealPath(), 'rb');
            $magic = $handle ? fread($handle, 4) : '';
            if ($handle) {
                fclose($handle);
            }
            if ($magic !== "PK\x03\x04") {
                return $this->fail("File bukan APK yang valid.");
            }

            $newPath = $file->storeAs(self::DIR, Str::uuid() . '.apk', 'local');
            if (!$newPath) {
                return $this->fail("Gagal menyimpan file.");
            }

            $form['file_name'] = $this->safeFileName($file->getClientOriginalName());
            $form['file_path'] = $newPath;
            $form['file_size'] = $file->getSize();
        }

        if ($apk) {
            $oldPath = $apk->file_path;
            $apk->update($form);

            if ($newPath && $oldPath && $oldPath !== $newPath) {
                Storage::disk('local')->delete($oldPath);
            }
        } else {
            ApkFile::create($form);
        }

        session()->flash("success", "Berhasil menyimpan file APK.");

        return response()->json([
            'code' => 200,
            'msg'  => "",
            'data' => []
        ]);
    }

    public function publish($id)
    {
        $id = decrypt($id);
        $apk = ApkFile::where('id', $id)->first();

        if (!$apk) {
            return $this->fail("Data tidak ditemukan.");
        }

        $apk->update([
            'publish' => request()->input("publish") == "1" ? 1 : 0
        ]);

        return response()->json([
            'code' => 200,
            'msg'  => "",
            'data' => []
        ]);
    }

    public function remove($id)
    {
        $id = decrypt($id);
        $apk = ApkFile::where('id', $id)->first();

        if (!$apk) {
            session()->flash("error", "Data tidak ditemukan.");
        } else {
            if ($apk->file_path) {
                Storage::disk('local')->delete($apk->file_path);
            }
            $apk->delete();
            session()->flash("success", "File APK berhasil dihapus.");
        }

        return response()->json([
            'code' => 200,
            'msg'  => "",
            'data' => []
        ]);
    }

    private function fail($msg)
    {
        return response()->json([
            'code' => 0,
            'msg'  => $msg,
            'data' => []
        ]);
    }

    /**
    * Filename for the download header: safe characters only, always ends with .apk. 
    */
    private function safeFileName($name)
    {
        $base = pathinfo($name, PATHINFO_FILENAME);
        $base = preg_replace('/[^A-Za-z0-9._\-]+/', '-', $base);
        $base = trim($base, '-.');

        return ($base !== '' ? $base : 'app') . '.apk';
    }
}
