<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return \Webfactor\WfBasicFunctionPackage\database\factories\PostFactory::new();
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
