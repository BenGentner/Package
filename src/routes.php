<?php


use Illuminate\Support\Facades\Route;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\GalleryController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\MediaController;
use Webfactor\WfBasicFunctionPackage\Http\Controllers\PostController;

/**
 * Gallery
*/

//Return all Galleries (maybe with on image (header))
Route::get('/galleries/', [GalleryController::class, 'show']);

//Return one Gallery with all images (or a specific amount that gets displayed at ones)
Route::get('/gallery/{gallery:title}', [GalleryController::class, 'index']);

//Returns one image
Route::get('/media/{media:slug}', [MediaController::class, 'index']);

/**
 * Post
 */

Route::get('/post/', [PostController::class], 'show');
Route::get('/post/{post}', [PostController::class], 'index');


