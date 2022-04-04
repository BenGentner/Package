<?php


use Illuminate\Support\Facades\Route;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\CategoryController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\CommentController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\GalleryController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\MediaController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\PostController;



Route::middleware('web')->group(function () {
    /**
     * Gallery
     */

//Return all Galleries (maybe with on image (header))
    Route::get(config("wf-routes.galleries_path"), [GalleryController::class, 'show_view']);
    Route::get("/api/" . config("wf-routes.galleries_path"), [GalleryController::class, 'show_api'] );

//Return one Gallery with all images (or a specific amount that gets displayed at ones)
    Route::get("/api/" .config("wf-routes.gallery_path"), [GalleryController::class, 'index_api']);

//Returns one image
    Route::get("/api/" . config("wf-routes.medium_path"), [MediaController::class, 'index_api']);

    /**
     * Post
     */

    Route::get('/api/posts/', [PostController::class, 'show_api']);
    Route::get('/api/'. config("wf-routes.single_post_path"), [PostController::class, 'index_api']);

    Route::get('/posts/', [PostController::class, 'show_view']);
    Route::get(config("wf-routes.single_post_path"), [PostController::class, 'index_view']);

    /**
     * Comment
     */

    Route::post(config("wf-routes.store_comment"), [CommentController::class, 'store']);
    Route::post(config("wf-routes.update_comment"), [CommentController::class, 'update']);

    Route::get("/current_user/", function () {
        return auth()->user();
    });
});

Route::get("api/categories", [CategoryController::class, 'show']);


/**
 * route to get config values
 */
Route::get('/url/{key}/', function ($key) {
    return config("wf-routes.$key");
});






