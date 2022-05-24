<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Gallery extends Model implements HasMedia
{
    use HasFactory;

    use InteractsWithMedia;


    public function registerMediaConversions(Media|\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(640)
            ->height(360);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('header')->singleFile();
        $this->addMediaCollection('images');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function header_image()
    {
        return $this->belongsTo(\Spatie\MediaLibrary\MediaCollections\Models\Media::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_user_id");
    }

//    protected static function boot()
//    {
//        parent::boot();
//
//        self::saved(function ($callback) {
//            if($callback->user_id != auth()->user()?->id)
//            {
//                if(auth()->user()?->id)
//                {
//                    $callback->user_id = auth()->user()?->id;
//                    $callback->save();
//                }
//            }
//        });
//
//        self::created(function ($callback) {
//            $callback->creator_user_id = auth()->user()?->id;
//        });
//    }
    public function createSlug()
    {
        return Str::slug($this->title);
    }

    public function save(array $options = [])
    {
        $this->slug = $this->createSlug();
        $this->user_id = auth()?->id();
        if(!$this->creator_user_id)
            $this->creator_user_id = auth()?->id();
        return parent::save($options);
    }
}
