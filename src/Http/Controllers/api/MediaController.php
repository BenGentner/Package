<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class MediaController extends Controller
{
    public function index($key)
    {
        /**
         * TODO:
         *  - get by name (maybe not unique)
         */
        $media = Media::where("id", $key)->first();
        if(!$media)
            abort(404);

        return $media;
    }
}
