<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\view;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class GalleryController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\GalleryController
{
    public function index($key)
    {
        $gallery = $this->index_api($key);
//        ddd($gallery);
        return view("Webfactor/WfBasicFunctionPackage/views/single_gallery", compact("gallery"));
    }

    public function show_api()
    {
        return Gallery::all()->load(['user', 'header_image']);
    }
    public function show()
    {
        return view("Webfactor/WfBasicFunctionPackage/views/galleries");
    }
}
