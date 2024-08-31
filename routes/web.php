<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route for displaying the login form
Route::get('/', function () {
    return view('login');
})->name('login');

// Route for handling the login form submission
Route::post('/', [AuthController::class, 'login'])->name('login.submit');

// Registration routes
Route::get('register', function () {
    return view('register');
})->name('register');

Route::post('register', [AuthController::class, 'register'])->name('register.submit');

// Dashboard route
Route::get('dashboard', [AuthController::class, 'fetchUserData'])->name('dashboard')->middleware('auth');

// Logout route
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
