<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('api')->group(function () {
    
    // Simple test route
    Route::get('/ping', function () {
        return response()->json(['message' => 'API is working']);
    });

    // Auth routes (you'll define these controllers next)
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [UserController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

});
