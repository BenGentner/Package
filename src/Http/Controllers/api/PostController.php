<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Category;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;
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

    public function show(Request $request)
    {
        $skip = $request->skip ? $request->skip : config('wf-functions.default_skip_posts');
        $amount = $request->amount ? $request->amount :  config('wf-functions.default_amount_posts');

        //just posts with a specific category
        $category = $request->category;
        if($category)
            return Post::latest()->where("category_id", $category)->take($amount)->skip($skip)->with(["user", "category"])->get();

        //get posts from all categories
        return Post::query()->take($amount)->skip($skip)->with(["user", "category"])->get();
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
