<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class GalleryController extends Controller
{
    public function index_api($key)
    {
        $gallery = Gallery::where("title", $key)
                    ->orWhere("id", $key)->first();
        if(!$gallery)
            abort(Response::HTTP_FORBIDDEN);

        $gallery->images = Media::where("model_id", $gallery->id)->where("collection_name", "images")->get();

        return $gallery;
    }

    public function index_show($key)
    {
        $gallery = $this->index_api($key);
//        ddd($gallery);
        return view("Webfactor/WfBasicFunctionPackage/views/single_gallery", compact("gallery"));
    }

    public function show_api()
    {
        return Gallery::all()->load(['user', 'header_image']);
    }
    public function show_view()
    {
        return view("Webfactor/WfBasicFunctionPackage/views/galleries");
    }
}
