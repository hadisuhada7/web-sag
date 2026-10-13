<?php

namespace App\Http\Controllers;

use App\Models\ApkFile;
use Illuminate\Support\Facades\Storage;

class FileStorageController extends Controller
{
    /**
     * Halaman publik: tabel daftar APK yang sudah dipublish.
     */
    public function index()
    {
        return view("filestorage.index", [
            'list' => ApkFile::published()
                ->orderByDesc('release_date')
                ->orderByDesc('id')
                ->get()
        ]);
    }

    /**
     * Download APK. File disimpan di luar folder public, jadi selalu lewat route ini.
     * Hanya data yang berstatus publish yang bisa diunduh.
     */
    public function download($id)
    {
        $apk = ApkFile::published()->where('id', $id)->first();

        if (!$apk || !Storage::disk('local')->exists($apk->file_path)) {
            abort(404, 'File not found');
        }

        return Storage::disk('local')->download($apk->file_path, $apk->file_name, [
            'Content-Type' => 'application/vnd.android.package-archive',
        ]);
    }
}
