<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware(['auth'])->group(function () {
    // Routes gérées par le DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/examples/ui', [DashboardController::class, 'example'])->name('examples.ui');
});

// SECTION -  Routes pour la gestion des utilisateurs (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UserController::class);
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});


require __DIR__ . '/auth.php';
