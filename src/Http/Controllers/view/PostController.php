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
    /**
     * not sure if front end create, edit and so on is needed since nova will be used
     */

    public function index($post)
    {
        /*
         * TODO:
         *  - view improvements
         */

        $post = parent::index($post);
        return view("Webfactor/WfBasicFunctionPackage/views/single_post", compact("post"));
    }

    /**
     *  TODO:
     *      -can be removed when tested
     *      - Moved to own controller:
     *
     */
//    public function show_api(Request $request)
//    {
//        //just posts with a specific category
//        $category = $request->category;
//        if($category)
//            return Post::where("category_id", $category)->get()->load(["user", "category"]);
//
//        //all posts
//        return Post::all()->load(["user", "category"]);
//
//    }


    public function show()
    {
        return view("Webfactor/WfBasicFunctionPackage/views/posts");
    }
    public function create()
    {
        // return create view
    }

    public function store(Post $post)
    {
        // store Post in db + validation (gets called by post method)
    }

    public function edit(Post $post)
    {
        // return default edit view
    }

    public function update(Post $post)
    {
        //save edited post in database
    }
    public function destroy(Post $post)
    {
        //remove post

        $post->delete();

        return redirect('/')->with('success', 'Post has been removed');
    }
}
