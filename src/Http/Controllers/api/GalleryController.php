<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpseclib3\Math\PrimeField\Integer;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;

class GalleryController extends Controller
{
    public function index($key)
    {
        $gallery = Gallery::where("title", $key)
                    ->orWhere("id", $key)->first();
        if(!$gallery)
            abort(Response::HTTP_FORBIDDEN);

        $gallery->images = $gallery->getMedia("images");

        return $gallery;
    }
    public function show()
    {
        $skip = \request()->skip ? \request()->skip : config('wf-functions.default_skip_galleries');
        $amount = \request()->amount ? \request()->amount : config('wf-functions.default_amount_galleries');

        return Gallery::latest()->take($amount)->skip($skip)->with(['user', 'header_image'])->get();
    }
}
