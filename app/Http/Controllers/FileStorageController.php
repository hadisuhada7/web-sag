<?php

namespace App\Http\Controllers;

use App\Models\ApkFile;
use Illuminate\Support\Facades\Storage;

class FileStorageController extends Controller
{
    /**
    * Public page: table listing published APKs. 
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
    * Download APK. The file is stored outside the public folder, so access is always routed through this endpoint. 
    * Only data with a 'published' status can be downloaded. 
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
