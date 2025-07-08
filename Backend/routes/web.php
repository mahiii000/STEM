<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

// Root route - this is the one that loads at http://127.0.0.1:8000/
Route::get('/', function () {
    return view('signin'); // Make sure welcome.blade.php exists in resources/views
})->name('home');

// Signin page route
Route::get('/signin', function () {
    return view('signin'); // Make sure signin.blade.php exists in resources/views
})->name('signin');

// Register POST route handled by AuthController
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Add more routes below as needed, for example:
// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
