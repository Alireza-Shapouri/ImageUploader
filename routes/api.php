<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::prefix('products')->group(function () {
    // Add New product
    Route::post('/', [ProductController::class, 'store']);

    // Get product images
    Route::get('{product}/images', [ProductController::class, 'getProductImages']);

    // Add new image to product
    Route::post('{product}/images', [ProductController::class, 'addImageToProduct']);

    // Delete product image by image_id
    Route::delete('images/{image}', [ProductController::class, 'deleteProductImage']);
});

Route::prefix('users')->group(function () {
    // Get all users
    Route::get('/', [UserController::class, 'index']);

    // Add new user
    Route::post('/', [UserController::class, 'store']);

    // Get user images
    Route::get('/{user}/images', [UserController::class, 'getUserImages']);
});
