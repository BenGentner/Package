<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;

use Illuminate\Http\Request;

class PostController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\PostController
{
    public function index(Request $request)
    {
        return view("Webfactor/WfBasicFunctionPackage/posts");
    }


    public function show($post)
    {
        $post = parent::show($post);
        return view("Webfactor/WfBasicFunctionPackage/single_post", compact("post"));
    }

}
