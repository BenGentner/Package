<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MediaController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\MediaController
{
    public function index($key)
    {
        return redirect(parent::index($key));
    }
}
