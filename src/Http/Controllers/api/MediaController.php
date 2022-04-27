<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;


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
