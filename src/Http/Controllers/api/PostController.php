<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Category;
use Webfactor\WfBasicFunctionPackage\Models\post;

class PostController extends Controller
{
    /**
     * not sure if front end create, edit and so on is needed since nova will be used
     */


    public function index($post)
    {
        $post = Post::where("slug", $post)
                        ->orwhere('id', $post)->first()->load(["user", "comments", "category"]);
        if(!$post)
            abort(Response::HTTP_FORBIDDEN);

        return $post;
    }
    public function index_view($post)
    {
        /*
         * TODO:
         *  - view improvements
         */
        $post = $this->index_api($post);
        return view("Webfactor/WfBasicFunctionPackage/views/single_post", compact("post"));
    }

    public function show(Request $request)
    {
        //just posts with a specific category
        $category = $request->category;
        if($category)
            return Post::where("category_id", $category)->get()->load(["user", "category"]);

        //all posts
        return Post::all()->load(["user", "category"]);
        /*
         * TODO:
         *  -check if all posts should be loaded or just a couple (extra method needed)
         */
    }

    public function show_view()
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
