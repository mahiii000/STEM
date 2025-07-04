<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EngineeringController;


Route::get('/signin', function () {
    return view('signin'); // shows signin.blade.php
})->name('signin');


Route::get('/review', function () {
    return view('review');
});

Route::get('/engineering', function () {
    return view('engineering');
});

Route::get('/math', function () {
    return view('math');
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/review', [ReviewController::class, 'submit'])->name('review.submit');
Route::get('/engineering', [EngineeringController::class, 'index']);
Route::get('/math', [App\Http\Controllers\PageController::class, 'math'])->name('math');
