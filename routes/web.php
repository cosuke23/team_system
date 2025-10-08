<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Public and authentication routes
|
*/

// Main public pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/services', [PageController::class, 'services'])->name('services');

// 🔹 Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// 🔹 Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// 🔹 Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 🔹 Example protected page (requires login)

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
Route::get('/upload-documents', [DashboardController::class, 'uploadDocuments'])->name('upload.documents');
Route::post('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/upload-documents', [UploadController::class, 'index'])->name('upload.documents');
