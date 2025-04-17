<?php

namespace App\Providers;

use App\View\Components\Card\Card;
use App\View\Components\Form\Form;
use App\View\Components\Table\Table;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('card', Card::class);
        Blade::component('form', Form::class);
        Blade::component('table', Table::class);


        // Directive pour vérifier si l'utilisateur est admin
        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->isAdmin();
        });

        // Vous pouvez ajouter d'autres directives pour d'autres rôles
        // Exemple:
        // Blade::if('role', function ($role) {
        //    return auth()->check() && auth()->user()->role->value === $role;
        // });

        // Paginator::defaultView('tailwind');

        // Paginator::defaultSimpleView('simple-tailwind');
    }
}
