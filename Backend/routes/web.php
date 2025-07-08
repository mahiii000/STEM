<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

// EditController routes
Route::get('/edit', [App\Http\Controllers\EditController::class, 'show'])->name('edit.show');
Route::post('/edit', [App\Http\Controllers\EditController::class, 'update'])->name('edit.update');

// EngineeringController route
Route::get('/engineering', [App\Http\Controllers\EngineeringController::class, 'index'])->name('engineering.index');

// PageController route
Route::get('/math', [App\Http\Controllers\PageController::class, 'math'])->name('page.math');

// ProfileController routes
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/destroy', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

// ReviewController route
Route::post('/review/submit', [App\Http\Controllers\ReviewController::class, 'submit'])->name('review.submit');

// ScienceController route
Route::get('/science', [App\Http\Controllers\ScienceController::class, 'index'])->name('science.index');

// TechnologyController route
Route::get('/technology', [App\Http\Controllers\TechnologyController::class, 'show'])->name('technology.show');

// Review page route (GET)
Route::get('/review', function () {
    return view('review'); // Make sure review.blade.php exists in resources/views
})->name('review');




Route::get('/', [HomeController::class, 'index']);
