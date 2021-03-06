<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Comment;
use Webfactor\WfBasicFunctionPackage\Models\Post;

class CommentController extends Controller
{
    public function index($key)
    {
        $post = config('wf-resource.models.post')::where("slug", $key)
            ->orWhere("id", $key)->first();

        if(!$post)
            return abort(Response::HTTP_FORBIDDEN);
        return $post;
    }
    public function store($key)
    {
        $post = $this->index($key);

        if(!auth()->user())
        {
            session()->flash('error', 'you need to be logged in to create a comment');
            return;
        }


        config('wf-resource.models.comment')::create(array_merge($this->validation(), [
            "post_id" => $post->id,
            "user_id" => auth()->user()->id
        ]));

        session()->flash('success', 'Comment has been created');

    }
    public function update($key)
    {
        $comment = config('wf-resource.models.comment')::find($key);

        if(!$comment)
            abort(Response::HTTP_FORBIDDEN);

        if(!auth()->user())
        {
            session()->flash('error', 'you need to be logged in comment');
            return;
        }

        $comment->update($this->validation());

        session()->flash('success', 'Comment has been updated');

        return ["message" => "success"];
    }

    protected function validation()
    {
        return \request()->validate([
            'body' => 'required',
        ]);
    }
}
