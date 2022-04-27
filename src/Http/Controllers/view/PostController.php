<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Category;
use Webfactor\WfBasicFunctionPackage\Models\post;

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
