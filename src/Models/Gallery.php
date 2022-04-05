<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Gallery extends Model implements HasMedia
{
    use HasFactory;

    use InteractsWithMedia;

    public function registerMediaConversions(Media|\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('my_multi_collection');
    }


//    public function media()
//    {
//        return $this->belongsToMany(media::class);
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function header_image()
    {
        return $this->belongsTo(Media::class);
    }




}
