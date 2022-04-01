<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webfactor\WfBasicFunctionPackage\Models\Comment;
use Webfactor\WfBasicFunctionPackage\Models\Post;

class CommentController extends Controller
{
    public function store($key)
    {
        $post = Post::where("slug", $key)
            ->orWhere("id", $key)->first();

        if(!$post)
            abort(404);

        \request()->validate([
            'body' => 'required'
        ]);
        return \auth()->user();

        if(!auth()->user())
            return ["message" => "Failed! Please login!"];

        Comment::create([
            "user_id" => auth()->id(),
            "post_id" => $post->id,
            "body" => \request()->body,
        ]);

        return ["message" => "success"];
    }
}
