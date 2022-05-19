<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Webfactor\WfBasicFunctionPackage\Models\Tag;

class TagController extends Controller
{
    public function show($key)
    {
        return config('wf-resource.models.tag')::where("slug", $key)
            ->orWhere("id", $key)->first();
    }
    public function index()
    {
        return config('wf-resource.models.tag')::all();
    }
}
