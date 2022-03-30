<?php


use Illuminate\Support\Facades\Route;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\GalleryController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\MediaController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\PostController;

/**
 * Gallery
*/

//Return all Galleries (maybe with on image (header))
Route::get(config("wf-routes.galleries_path"), [GalleryController::class, 'show']);

//Return one Gallery with all images (or a specific amount that gets displayed at ones)
Route::get(config("wf-routes.gallery_path"), [GalleryController::class, 'index']);

//Returns one image
Route::get('/media/{media:slug}', [MediaController::class, 'index']);

/**
 * Post
 */

Route::get('/posts/', [PostController::class, 'show']);
Route::get('/post/{post}', [PostController::class, 'index']);


Route::get('/view', [MediaController::class, 'testing']);

