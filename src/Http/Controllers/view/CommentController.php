<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\view;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Comment;
use Webfactor\WfBasicFunctionPackage\Models\Post;

class CommentController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\CommentController
{
    public function store($key)
    {
        $post = Post::where("slug", $key)
            ->orWhere("id", $key)->first();

        if(!$post)
            abort(Response::HTTP_FORBIDDEN);

        $this->validation();

        Comment::create([
            "user_id" => auth()->id(),
            "post_id" => $post->id,
            "body" => \request()->body,
        ]);

        return ["message" => "success"];
    }
    public function update($key)
    {
        $comment = Comment::find($key);

        if(!$comment)
            abort(Response::HTTP_FORBIDDEN);

        $this->validation();

        $comment->update([
            "body" => \request()->body,
        ]);

        return ["message" => "success"];
    }

    public function validation()
    {
        \request()->validate([
            'body' => 'required'
        ]);

        if(!auth()->user())
            return ["message" => "Failed! Please login!"];
    }
}
