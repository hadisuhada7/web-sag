<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CSR;
use App\Models\News;

class CsrController extends Controller
{
    public function summary() {
        return view("csr.summary", []);
    }

    public function education() {
        return view("csr.education", [
            'list'  => CSR::where("mode", "env")->where("publish", 1)->orderBy("created_at", "desc")->get()
        ]);
    }

    public function safety() {
        return view("csr.safety", [
            'list'  => CSR::where("mode", "safety")->where("publish", 1)->orderBy("created_at", "desc")->get()
        ]);
    }

    public function sosial() {
        return view("csr.sosial", [
            'list'  => CSR::where("mode", "sosial")->where("publish", 1)->orderBy("created_at", "desc")->get()
        ]);
    }

    public function news() {
        return view("csr.news", [ 
            'list'  => News::where("mode", "news")->where("publish", 1)->orderBy("created_at", "desc")->get()
        ]);
    }

    public function getList()
    {
        $keyword = request()->query("keyword");
        $page = request()->query("page", 1);
        $mode = request()->query("mode");

        $page = $page ? $page : 1;

        if($mode == "news")
        {
            $find = News::where("mode", $mode)->where("publish", 1)->orderBy("created_at", "desc");

            if($keyword)
            {
                $keys = explode(" ", $keyword);
                $find = $find->where(function($query)use($keys){
                    for($i = 0; $i < count($keys); $i++)
                    {
                        $query = $query->where("title", "like", "%" .$keys[$i]. "%")->orWhere("content", "like", "%" .$keys[$i]. "%");
                    }
                    return $query;
                });
            }
            
            $find = $find->get()->chunk(9);

            return view("csr.list", [
                'list'  => count($find) ? $find[$page - 1] : [],
                'total' => count($find),
                'page'  => $page
            ]);
        }else{
            $allow = ["env", "safety", "sosial"];
            if(!in_array($mode, $allow))
                return view("csr.list", [
                    'list'  => [],
                    'total' => 0,
                    'page'  => 0
                ]);

            $find = CSR::where("mode", $mode)->where("publish", 1)->orderBy("created_at", "desc");

            if($keyword)
            {
                $keys = explode(" ", $keyword);
                $find = $find->where(function($query)use($keys){
                    for($i = 0; $i < count($keys); $i++)
                    {
                        $query = $query->where("title", "like", "%" .$keys[$i]. "%")->orWhere("content", "like", "%" .$keys[$i]. "%");
                    }
                    return $query;
                });
            }
            
            $find = $find->get()->chunk(9);

            return view("csr.list", [
                'list'  => count($find) ? $find[$page - 1] : [],
                'total' => count($find),
                'page'  => $page
            ]);
                
        }
    }

    public function getDetail()
    {
        $slug = request()->query("slug", "");
        $mode = request()->query("mode", "env");

        if($slug)
        {$slug = str_replace("-", " ", $slug);
            $find = Csr::where("mode", $mode)->where("title", "like", "%" . $slug . "%")->first();

            if($mode == "news")
                $find = News::where("mode", "news")->where("title", "like", "%" . $slug . "%")->first();

            return view("csr.detail", ['r' => $find]);
        }

        return response()->noContent();
    }


}
