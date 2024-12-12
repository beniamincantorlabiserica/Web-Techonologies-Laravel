<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{UserController, PostController};

Route::middleware('throttle:api')->group(function () {
    // User routes
    Route::get('/profile/{id}', [UserController::class, 'profile']);
    Route::apiResource('users', UserController::class);

    // Post routes
    Route::apiResource('posts', PostController::class);
    Route::post('/profile/{id}', [FollowController::class, 'follow'])->name('follow');
});

Route::middleware('auth:sanctum')->group(function () {
    // Protected routes
});
