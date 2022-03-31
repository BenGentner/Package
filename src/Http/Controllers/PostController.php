<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\post;

class PostController extends Controller
{
    /**
     * not sure if front end create, edit and so on is needed since nova will be used
     */

    public function index(Post $post)
    {
        // return default view with one post
    }
    public function show_api()
    {
        // return default view with all posts
        return Post::all()->load(["user", "category"]);
        /*
         * TODO:
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
