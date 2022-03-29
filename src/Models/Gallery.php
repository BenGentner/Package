<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->belongsToMany(media::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
