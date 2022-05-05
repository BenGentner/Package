<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Webfactor\WfBasicFunctionPackage\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        return Category::all();
    }
    public function index($key)
    {
        return Category::where("slug", $key)
            ->orWhere("id", $key)->first();
    }
}
