<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class GalleryController extends Controller
{
    public function index($key)
    {
        $gallery = Gallery::where("title", $key)
                    ->orWhere("id", $key)->first();
        if(!$gallery)
            abort(Response::HTTP_FORBIDDEN);

        $gallery->images = Media::where("model_id", $gallery->id)->where("collection_name", "images")->get();

        return $gallery;
    }
    public function show()
    {
        return Gallery::all()->load(['user', 'header_image']);
    }
}
