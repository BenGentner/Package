<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class MediaController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\MediaController
{
    public function index_api($key)
    {
        /**
         * TODO:
         *  - tests (new where and abort part)
         *  - media return anpassen (redirect("./storage/$media->path"))
         */
        $media = Media::where("slug", $key)
                        ->orwhere("id", $key)->first();
        if(!$media)
            abort(404);

        return $media;
    }

    public function testing()
    {
//        return  "hi";
        return view("WfFunctions::test");
    }

}
