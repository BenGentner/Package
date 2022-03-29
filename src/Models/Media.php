<?php

namespace Webfactor\WfBasicFunctionPackage\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
