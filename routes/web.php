<?php

use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware(['auth'])->group(function () {
    // SECTION Route de redirection
    Route::get('/dashboard', function () {
        return redirect(RouteServiceProvider::home());
    })->name('dashboard');

    // SECTION Dashboard admin
    Route::middleware('role:admin')->group(function () {
        Route::view('/admin/dashboard', 'pages.admin.dashboard')->name('admin.dashboard');
    });

    // SECTION -  Dashboard user
    Route::middleware('role:user')->group(function () {
        Route::view('/user/dashboard', 'pages.user.dashboard')->name('user.dashboard');
    });

    // SECTION -  Page d'exemples de composants UI
    Route::view('/examples/ui', 'pages.examples-ui')->name('examples.ui');
});

// SECTION -  Routes pour la gestion des utilisateurs (admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
});

Route::view('profile', 'pages.user.profile')
    ->middleware(['auth'])
    ->name('profile');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});


require __DIR__ . '/auth.php';
