<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;

class GalleryController extends Controller
{
    public function index($gallery)
    {
        $gallery = Gallery::where("title", $gallery)->first();
        return $gallery->load(['user', 'media']);
    }

    public function show()
    {
        return Gallery::all()->load(['user', 'header_image']);
    }
}