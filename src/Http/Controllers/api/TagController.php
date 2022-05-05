<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Webfactor\WfBasicFunctionPackage\Models\Tag;

class TagController extends Controller
{
    public function show()
    {
        return Tag::all();
    }
    public function index($key)
    {
        return Tag::where("slug", $key)
            ->orWhere("id", $key)->first();
    }
}
