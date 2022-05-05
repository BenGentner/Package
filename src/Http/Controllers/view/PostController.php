<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;

use Illuminate\Http\Request;

class PostController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\PostController
{
    public function index($post)
    {
        $post = parent::index($post);
        return view("Webfactor/WfBasicFunctionPackage/single_post", compact("post"));
    }


    public function show(Request $request)
    {
        return view("Webfactor/WfBasicFunctionPackage/posts");
    }

}
