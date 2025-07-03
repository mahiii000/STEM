<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;


Route::get('/signin', function () {
    return view('signin'); // shows signin.blade.php
})->name('signin');


Route::get('/review', function () {
    return view('review');
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/review', [ReviewController::class, 'submit'])->name('review.submit');