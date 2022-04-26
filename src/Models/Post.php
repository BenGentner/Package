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

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_user_id");
    }

    public function scopeSearch($query, $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where(fn($query) =>
                $query->where("title", "like", "%" . $search . "%")
                      ->orwhereHas("user", fn ($query) =>
                          $query->where("name", "like", "%" . $search . "%"))
                      ->orwhereHas("tags", fn ($query) =>
                          $query->where("name", "like", "%" . $search . "%"))
            );
        });
//        $query->when($filters['search'] ?? false, function ($query, $search) {
//
//        });
        return $query;
    }

    protected static function boot()
    {
        parent::boot();

        self::saved(function ($callback) {
            if($callback->user_id != auth()->user()?->id)
            {
                if(auth()->user()?->id)
                {
                    $callback->user_id = auth()->user()?->id;
                    $callback->save();
                }
            }
        });
        self::created(function ($callback) {
            $callback->creator_user_id = auth()->user()?->id;
        });
    }
}
