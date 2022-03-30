<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class MediaController extends Controller
{
    public function index($media)
    {
        /**
         * TODO:
         * Null abfrage
         */


        $media = Media::where("slug", $media)->first();
        return redirect("./storage/$media->path");
    }

    public function testing()
    {
//        return  "hi";
        return view("WfFunctions::test");
    }

}
