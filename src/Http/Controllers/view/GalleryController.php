<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\view;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpseclib3\Math\PrimeField\Integer;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;
use Webfactor\WfBasicFunctionPackage\Models\Media;

class GalleryController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\GalleryController
{
    public function index($key)
    {
        $gallery = parent::index($key);
        return view("Webfactor/WfBasicFunctionPackage/views/single_gallery", compact("gallery"));
    }

    public function show()
    {
        return view("Webfactor/WfBasicFunctionPackage/views/galleries");
    }
}
