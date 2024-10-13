<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route to show the welcome page with reviews
Route::get('/', [ReviewController::class, 'index'])->name('welcome');

// Route to show the about page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Route to show the package page
Route::get('/package', [PackageController::class, 'index'])->name('package.index');

// Route to show the contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Route to show the dashboard (requires authentication and verification)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

    // Routes for managing packages, accessible only through the dashboard
    Route::resource('packages', PackageController::class)->except(['index']);
});

// Routes for authenticated user profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for managing reviews
Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

// Routes for viewing users (requires authentication)
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Include authentication routes
require __DIR__.'/auth.php';
