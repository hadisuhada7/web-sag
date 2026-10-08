<?php

namespace App\Http\Controllers\Admin\Investor;

use App\Http\Controllers\Controller;
use App\Models\{
    Rups,
    Media
};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RupsController extends Controller
{
    public function list()
    {

        return view("admin.investor.rups", [
            'rups'  => Rups::all()
        ]);
    }

    public function getOne($id)
    {
        $id = decrypt($id);
        $find = Rups::where('id', $id)->first();
        if($find)
        {
            $find = $find->toArray();
            $find["id"] = encrypt($find['id']);
            $find['documents'] = json_decode($find['documents']);

            return response()->json([
                'code'  => 200,
                'msg'   => "",
                'data'  => $find
            ]);
        }
    }

    public function save()
    {
        
        $id = request()->input("id");
        $eventName = request()->input("formEventName");
        $eventYear = request()->input("formEventYear");
        $documents = [];

        $rows = request()->input("totalRow");
        for($i = 0; $i < $rows; $i++)
        {
            $row = $i+1;
            $mediaId = request()->input("mediaId".$row);
            $documentTitle = request()->input("documentTitle".$row);
            $documentDate = request()->input("documentDate".$row);
            $documentFile = request()->file("documentFile".$row);

            $document = [
                'mediaId'   => $mediaId,
                'documentTitle' => $documentTitle,
                'documentDate'  => $documentDate
            ];

            if($documentFile)
            {
                $fileId = Str::uuid();
                $ext = strtolower($documentFile->getClientOriginalExtension());
                if($documentFile->move(app_path("Uploads"), $path = $fileId . "." . $ext))
                {
                    Media::create([
                        'mediaId' => $fileId,
                        'mediaType' => $_FILES["documentFile".$row]['type'],
                        'mediaExt' => $ext,
                        'resultPath' => $path
                    ]);
                    $document["mediaId"] = $fileId;
                }
            }
            $documents[] = $document;
        }

        if($id)
            $id = decrypt($id);

        $find = Rups::where("id", $id)->first();

        if($find)
        {
            Rups::where("id", $id)->update([
                'eventname' => $eventName,
                'eventyear' => $eventYear,
                'documents' => json_encode($documents)
            ]);

            session()->flash("success", "Berhasil Menyimpan Event.");
        }else{
            $create = Rups::create([
                'eventname' => $eventName,
                'eventyear' => $eventYear,
                'documents' => json_encode($documents)
            ]);
            session()->flash("success", "Berhasil Menyimpan Event.");
        }

        return redirect()->to('/wongelek/investor/rups');
    }

    public function remove($id)
    {
        $id = decrypt($id);
        $find = Rups::where('id', $id)->first();

        if(!$find)
        {
            session()->flash("error", "Event tidak ditemukan.");
        }else{
            $find->delete();
            session()->flash("success", "Event berhasil di hapus.");
        }
        return response()->json([
            'code' => 200,
            'msg'   => "",
            'data'  => []
        ]);
    }


}
