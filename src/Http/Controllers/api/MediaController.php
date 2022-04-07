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
