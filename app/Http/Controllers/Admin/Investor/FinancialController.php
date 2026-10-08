<?php

namespace App\Http\Controllers\Admin\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{
    FinancialReport,
    Media
};

class FinancialController extends Controller
{
    public function list()
    {
        return view("admin.investor.financial", [
            'financials' => FinancialReport::all()
        ]);
    }

    public function save()
    {
        $title = request()->input("title");
        $periode = request()->input("periode");
        $dated = request()->input("dated");
        $publish = request()->input("publish");
        $image = request()->file("image");
        $file = request()->file("file");

        // image
        $imageId = Str::uuid();
        $imageExt = strtolower($image->getClientOriginalExtension());
        $image->move(app_path("Uploads"), $imagePath = $imageId . "." . $imageExt);

        Media::create([
            'mediaId' => $imageId,
            'mediaType' => $_FILES['image']['type'],
            'mediaExt' => $imageExt,
            'resultPath' => $imagePath
        ]);

        // file
        $fileId = Str::uuid();
        $fileExt = strtolower($file->getClientOriginalExtension());
        $file->move(app_path("Uploads"), $filePath = $fileId . "." . $fileExt);

        Media::create([
            'mediaId' => $fileId,
            'mediaType' => $_FILES['file']['type'],
            'mediaExt' => $fileExt,
            'resultPath' => $filePath
        ]);

        FinancialReport::create([
            'title' => $title,
            'yearperiode' => $periode,
            'dated' => $dated,
            'thumbnailId' => $imageId,
            'fileId' => $fileId,
            'publish'   => $publish
        ]);

        session()->flash("success", "Berhasil Menyimpan Laporan Keuangan.");

        return response()->json([
            'code'  => 200,
            'msg'   => "",
            'data'  => []
        ]);
    }

    public function publish($id)
    {
        $id = decrypt($id);
        FinancialReport::where("id", $id)->update([
            'publish'   => request()->query("publish") == "1" ? 1 : 0
        ]);

        return response()->json([
            'code'  => 200,
            'msg'   => "",
            'data'  => []
        ]);
    }

    public function remove($id)
    {
        $id = decrypt($id);
        $banner = FinancialReport::where('id', $id)->first();

        if(!$banner)
        {
            session()->flash("error", "Laporan Keuangan tidak ditemukan.");
        }else{
            $banner->delete();
            session()->flash("success", "Laporan Keuangan berhasil di hapus.");
        }
        return response()->json([
            'code' => 200,
            'msg'   => "",
            'data'  => []
        ]);
    }
}
