<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;


class GalleryController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\GalleryController
{
    public function index()
    {

        return view("Webfactor/WfBasicFunctionPackage/galleries");
    }

    public function show($key)
    {
        $gallery = parent::show($key);
        return view("Webfactor/WfBasicFunctionPackage/single_gallery", compact("gallery"));
    }
}
