<?php


use Illuminate\Support\Facades\Route;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\CommentController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\GalleryController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\MediaController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\PostController;

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

Route::get('/posts/', [PostController::class, 'show_view'])->middleware("web");
Route::get(config("wf-routes.single_post_path"), [PostController::class, 'index_view'])->middleware("web");

/**
 * Comment
 */

Route::post(config("wf-routes.store_comment"), [CommentController::class, 'store'])->middleware("web");

/**
 * route to get config values
 */
Route::get('/url/{key}/', function ($key) {
    return config("wf-routes.$key");
});




