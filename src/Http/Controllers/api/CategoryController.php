<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Webfactor\WfBasicFunctionPackage\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        return config('wf-resource.models.category')::all();
    }
    public function index($key)
    {
        return config('wf-resource.models.category')::where("slug", $key)
            ->orWhere("id", $key)->first();
    }
}
