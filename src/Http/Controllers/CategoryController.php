<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webfactor\WfBasicFunctionPackage\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        return Category::all();
    }
}
