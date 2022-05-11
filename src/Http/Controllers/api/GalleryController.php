<?php

namespace Webfactor\WfBasicFunctionPackage\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Models\Gallery;

class GalleryController extends Controller
{
    public function index($key)
    {
        $gallery = config('wf-resource.models.gallery')::where("slug", $key)
                    ->orWhere("id", $key)->first();
        if(!$gallery)
            abort(Response::HTTP_NOT_FOUND);

        $gallery->images = $gallery->getMedia("images");

        return $gallery;
    }
    public function show()
    {
        $skip = \request()->skip ? \request()->skip : config('wf-base.default_skip_galleries');
        $amount = \request()->amount ? \request()->amount : config('wf-base.default_amount_galleries');

        return config('wf-resource.models.gallery')::latest()->take($amount)->skip($skip)->with(['user', 'header_image'])->get();
    }
    protected function validation()
    {
        \request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique("galleries", "slug")],
        ]);
    }
}
