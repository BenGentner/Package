<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Webfactor\WfBasicFunctionPackage\database\factories\TagFactory::new();
    }

    public function posts()
    {
        return $this->belongsToMany(post::class);
    }

}
