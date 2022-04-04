<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

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


    public function index_api($post)
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
    public function show_api(Request $request)
    {
        // return default view with all posts
        $category = $request->category;
//        print_r($category);
        if(!$category)
            return Post::all()->load(["user", "category"]);
        return Post::where("category_id", $category)->get()->load(["user", "category"]);
        /*
         * TODO:
         *  -check if all posts should be loaded or just a couple (extra method needed)
         */
//        return Post::latest()->paginate(2);
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
