<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class MediaController extends Controller
{
    public function index_api($media)
    {
        /**
         * TODO:
         *  - Null abfrage
         *  - media return anpassen (redirect("./storage/$media->path"))
         */
        $media = Media::where("slug", $media)->first();
        return $media;
    }

    public function testing()
    {
//        return  "hi";
        return view("WfFunctions::test");
    }

}
