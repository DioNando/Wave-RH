<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware(['auth'])->group(function () {
    // * Route de redirection
    Route::get('/dashboard', function () {
        return redirect(RouteServiceProvider::home());
    })->name('dashboard');

    // * Dashboard admin
    Route::middleware('role:admin')->group(function () {
        Route::view('/admin/dashboard', 'pages.admin.dashboard')->name('admin.dashboard');
    });

    // * Dashboard user
    Route::middleware('role:user')->group(function () {
        Route::view('/user/dashboard', 'pages.user.dashboard')->name('user.dashboard');
    });

    // * Page d'exemples de composants UI
    Route::view('/examples/ui', 'pages.examples-ui')->name('examples.ui');
});

Route::view('profile', 'pages.profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
