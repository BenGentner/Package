<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Webfactor\WfBasicFunctionPackage\database\factories\CategoryFactory::new();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function save(array $options = [])
    {
        $this->slug = Str::slug($this->title);
        return parent::save($options);
    }
}
