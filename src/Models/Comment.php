<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ["user"];

    protected $fillable = ["user_id", "body", "post_id"];

    protected static function newFactory()
    {
        return \Webfactor\WfBasicFunctionPackage\database\factories\CommentFactory::new();
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
