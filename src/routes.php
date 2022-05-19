<?php


use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Webfactor\WfBasicFunctionPackage\Http\Controllers as controllers;


Route::middleware('web')->group(function () {
    /**
     * Gallery
     */

//Return all Galleries (maybe with on image (header))
    Route::get(config("wf-routes.galleries_path"), [App\Http\Controllers\WfBasicFunctionPackage\GalleryController::class, 'index']);
    Route::get("/api/" . config("wf-routes.galleries_path"), [controllers\api\GalleryController::class, 'index'] );

//Return one Gallery with all images (or a specific amount that gets displayed at ones)
    Route::get("/api/" .config("wf-routes.gallery_path"), [controllers\api\GalleryController::class, 'show']);
    Route::get(config("wf-routes.gallery_path"), [App\Http\Controllers\WfBasicFunctionPackage\GalleryController::class, 'show']);

//Returns one image
    Route::get("/api/" . config("wf-routes.medium_path"), [controllers\api\MediaController::class, 'show']);
    Route::get(config("wf-routes.medium_path"), [App\Http\Controllers\WfBasicFunctionPackage\MediaController::class, 'show']);

    /**
     * Post
     */

    Route::get('/api/'. config("wf-routes.multiple_posts_path"), [controllers\api\PostController::class, 'index']);
    Route::get('/api/'. config("wf-routes.single_post_path"), [controllers\api\PostController::class, 'show']);

    Route::get(config("wf-routes.multiple_posts_path"), [App\Http\Controllers\WfBasicFunctionPackage\PostController::class, 'index']);
    Route::get(config("wf-routes.single_post_path"), [App\Http\Controllers\WfBasicFunctionPackage\PostController::class, 'show']);

    /**
     * Comment
     */

    Route::post(config("wf-routes.store_comment"), [controllers\api\CommentController::class, 'store']);
    Route::post(config("wf-routes.update_comment"), [controllers\api\CommentController::class, 'update']);

    Route::get("/current_user/", function () {
        return auth()->user();
    });
});

Route::get("api/categories", [controllers\api\CategoryController::class, 'index']);


/**
 * route to get config values (for vue components)
 */
Route::get('/url/{key}/', function ($key) {
    return config("wf-routes.$key") ? config("wf-routes.$key") : abort(Response::HTTP_NOT_FOUND);
});






