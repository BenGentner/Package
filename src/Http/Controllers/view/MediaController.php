<?php

namespace App\Http\Controllers\WfBasicFunctionPackage;


class MediaController extends \Webfactor\WfBasicFunctionPackage\Http\Controllers\api\MediaController
{
    public function show($key)
    {
        return redirect(parent::index($key));
    }
}
