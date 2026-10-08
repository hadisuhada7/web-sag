<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{
    Product,
    ClientQuestion
};
class ProductController extends Controller
{
    public function summary() {
        
        return view("products.summary", [
            
        ]);
    }

    public function feed() {
        $products = Product::where("publish", 1)
                    ->where('category', 'pakanternak')
                    ->get()
                    ->chunk(8);
        return view("products.feed", [
            'list'  => $products
        ]);
    }

    public function dayOldChick() {
        $products = Product::where("publish", 1)
                    ->where('category', 'bibitayam')
                    ->get()
                    ->chunk(8);
        return view("products.dayoldchick", [
            'list'  => $products
        ]);
    }

    public function liveBird() {
        $products = Product::where("publish", 1)
                    ->where('category', 'ayamhidup')
                    ->get()
                    ->chunk(8);
        return view("products.livebird", [
            'list'  => $products
        ]);
    }

    public function broilers() {
        $products = Product::where("publish", 1)
                    ->where('category', 'ayampotong')
                    ->get()
                    ->chunk(8);
        return view("products.broilers", [
            'list'  => $products
        ]);
    }

    public function processedFood() {
        $products = Product::where("publish", 1)
                    ->where('category', 'makananolahan')
                    ->get()
                    ->chunk(8);
        return view("products.processedfood", [
            'list'  => $products
        ]);
    }

    public function get($id)
    {
        $id = decrypt($id);
        $find = Product::where("id", $id)->first();
        if(!$find) 
            return response()->json(['message' => "Record's Not Found."], 404);

        return response()->json($find);
    }

    public function faq()
    {
        $validator = Validator::make(request()->all(), [
            'name'  => "required",
            'email' => "required|email",
            'phone' => "required",
            'desc'  => "required"
        ]);

        if($validator->fails())
            return response()->json([
                'code'  => 0,
                'msg'   => $validator->errors()->first(),
                'data'  => []
            ]);

        ClientQuestion::create([
            'productid' => decrypt(request()->input("productId")),
            'name' => request()->input("name"),
            'email' => request()->input("email"),
            'phone' => request()->input("phone"),
            'description' => request()->input("desc")
        ]);

        return response()->json([
            'code'  => 200,
            'msg'   => "",
            'data'  => []
        ]);
    }
}
