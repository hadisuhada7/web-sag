<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\News;
use App\Models\Testimoni;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        return view("index", [
            'banners'   => Banner::where('publish', 1)->where("mode", "home")->get(),
            //'news'  => News::take(2)->get(),
            'news'  => News::where('publish', 1)->orderBy("created_at", "desc")->take(2)->get(),
            'testimoni' => Testimoni::take(3)->get()
        ]);
    }

    public function getResource($id)
    {
        $media = Media::where('mediaId', $id)->first();
        if(!$media)
            return response("File not found", 404);
        
        if(!File::exists($file = app_path("Uploads/" . $media->resultPath)))
            return response($media->resultPath, 404);

        return response(File::get($file), 200)->header("Content-Type", $media->mediaType);
    }

    public function testimoni()
    {
        $data = [
            [
                'id' => 6,
                'name' => 'Mela',
                'image' => url("") . '/assets/images/template/products/testimoni/Mela.png',
                'title' => 'product-testimoni-title.6',
                'says' => 'product-testimoni-say.6',
                'show' => 1,
                'created_at' => '26 March 2022 17:25:19',
                'updated_at' => NULL,
                'title_lang' => 'Kampung Parakan',
                'says_lang' => 'Awalnya saya bergabung dengan Belfoods, sebagai reseller, namun seiring dengan berjalannya waktu saya menjadi Agen Belfoods sendiri dan saya tidak menyangka bahwa saya bisa melampaui target yang ditetapkan. Saya senang dan semoga kedepannya saya bisa menjadi Agen Besar.'
            ]
        ];
        return response()->json($data);
    }
}
