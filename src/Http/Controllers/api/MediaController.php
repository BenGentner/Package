<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class MediaController extends Controller
{
    public function index($key)
    {
        $media = Media::where("uuid", $key)
            ->orWhere("name", $key)->first();
        if(!$media)
            abort(404);

        return $media->getFullUrl();
    }
}
