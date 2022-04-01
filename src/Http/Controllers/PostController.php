<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\post;

class PostController extends Controller
{
    /**
     * not sure if front end create, edit and so on is needed since nova will be used
     */


    public function index_api($post)
    {
        $post = Post::where("slug", $post)
                        ->orwhere('id', $post)->first()->load(["user", "comments", "category"]);
        if(!$post)
            abort(404);

        return $post;
    }
    public function index_view($post)
    {
        /*
         * TODO:
         *  - view improvements
         */
        $post = $this->index_api($post);
        return view("WfFunctions::single_post", compact("post"));
    }
    public function show_api()
    {
        // return default view with all posts
        return Post::all()->load(["user", "category"]);
        /*
         * TODO:
         *  -check if all posts should be loaded or just a couple (extra method needed)
         */
//        return Post::latest()->paginate(2);
    }
    public function show_view()
    {
        return view("WfFunctions::posts");
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
