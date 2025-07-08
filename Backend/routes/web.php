<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/signin', function () {
    return view('signin'); // shows signin.blade.php
})->name('signin');


Route::post('/register', [AuthController::class, 'register'])->name('register');