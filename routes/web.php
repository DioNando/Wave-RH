<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/examples/ui', [DashboardController::class, 'example'])->name('examples.ui');
});

// Routes pour la gestion des utilisateurs (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UserController::class);
});

// Routes pour la gestion des pays, régions et villes
Route::middleware(['auth'])->group(function () {
    Route::resource('/pays', PaysController::class);
    Route::resource('/regions', RegionController::class);
    Route::resource('/villes', VilleController::class);
});

// Gestion des erreurs personnalisée
Route::fallback(function () {
    $errorCode = 404;
    return response()->view("errors.{$errorCode}", [], $errorCode);
});

require __DIR__ . '/auth.php';
