<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Media;
use Illuminate\Support\Str;

class ManagementController extends Controller
{

    public function list()
    {
        return view("admin.management.list", [
            'list'  => Management::orderBy("order")->get()
        ]);
    }

    public function add()
    {
        session()->forget('managementKey');
        return redirect()->to('/wongelek/management/form');
    }

    public function edit($id)
    {
        try {
            $id = decrypt($id);
            $find = Management::where('id', $id)->first();
            if($find)
                session()->put('managementKey', $id);
        } catch (\Exception $e) {
            session()->forget('managementKey');
        }finally {
            return redirect()->to('/wongelek/management/form');
        }
    }

    public function form()
    {
        $find = new Management();
        if($id = session()->get("managementKey"))
            $find = Management::where('id', $id)->first();

        return view("admin.management.form", [
            'orders' => Management::all()->count() + 1,
            'rs' => $find
        ]);
    }

    public function save()
    {
        $id = null;
        if(session()->has("managementKey"))
            $id = session()->get("managementKey");

        $form = [
            'name'  => request()->input("formName"),
            'position'  => request()->input("formPosition"),
            'order'  => request()->input("formOrder"),
            'description'  => request()->input("formDescription")
        ];

        $photo = request()->file("formPhoto");

        $imageId = Str::uuid();
        $ext = strtolower($photo->getClientOriginalExtension());

        try {
            if($photo->move(app_path("Uploads"), $path = $imageId . "." . $ext))
            {
                Media::create([
                    'mediaId' => $imageId,
                    'mediaType' => $_FILES['formPhoto']['type'],
                    'mediaExt' => $ext,
                    'resultPath' => $path
                ]);

                $form['photo'] = $imageId;
            }

            if($id)
            {
                Management::where('id', $id)->update($form);
            }else{
                $save = Management::create($form);
                session()->put("managementKey", $save->id);
            }

            session()->flash("success", "Berhasil Menyimpan Manajement.");

            return redirect("/wongelek/management/form");
        } catch (\Exception $th) {
            session()->flash("error", "Gagal Menyimpan Manajement.");
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
            Management::where("id", $id)->delete();
            return redirect("/wongelek/management")->with("success", "Manajement berhasil di hapus.");
        } catch (\Exception $th) {
            return redirect("/wongelek/management")->with("error", "Gagal menghapus Manajement.");            
        }
    }
}
