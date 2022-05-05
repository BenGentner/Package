<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;


class GalleryController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\GalleryController
{
    public function index($key)
    {
        $gallery = parent::index($key);
        return view("Webfactor/WfBasicFunctionPackage/single_gallery", compact("gallery"));
    }

    public function show()
    {
        return view("Webfactor/WfBasicFunctionPackage/galleries");
    }
}
