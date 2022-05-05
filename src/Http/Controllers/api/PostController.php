<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\post;

class PostController extends Controller
{
    public function index($key)
    {
        $post = Post::where("slug", $key)
                        ->orwhere('id', $key)->first()->load(["user", "comments", "category", "tags"]);
        if(!$post)
            abort(Response::HTTP_NOT_FOUND);

        return $post;
    }

    public function show(Request $request)
    {
        $skip = $request->skip ? $request->skip : config('wf-base.default_skip_posts');
        $amount = $request->amount ? $request->amount :  config('wf-base.default_amount_posts');

        //just posts with a specific category
        $category = $request->category;

        if($category)
            return Post::latest()->where("category_id", $category)->search(\request(["search"]))->take($amount)->skip($skip)->with(["user", "category", "tags"])->get();

        //get posts from all categories
        return Post::query()->search(\request(["search"]))->take($amount)->skip($skip)->with(["user", "category", "tags"])->get();
    }

    public function store()
    {
        // store Post in db + validation (gets called by post method)
        Post::create(array_merge($this->validatePost(),
            [
                'user_id' => auth()->id(),
                'creator_user_id' => auth()->id(),
            ]
        ));

        session()->flash('success', 'Post has been created');
    }

    public function update($key)
    {
        $post = $this->index($key);

        $attributes = $this->validatePost($post);

        $post->update(array_merge($attributes,
            [
                'user_id' => auth()->id(),
            ]
        ));

        session()->flash('success', 'Post has been updated');

        return ["message" => "success"];
    }

    public function destroy(Post $post)
    {
        //remove post

        $post->delete();

        session()->flash('success', 'Post has been removed');
        return redirect('/')->with('success', 'Post has been removed');
    }

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'slug' => ['required' , Rule::unique('posts', 'slug')->ignore($post->id)], //when updating
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
