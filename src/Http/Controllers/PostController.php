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

    public function index()
    {
        // return default view with all posts
    }
    public function show(Post $post)
    {
        // return default view with one post
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
