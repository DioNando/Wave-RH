<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Définir vos politiques ici
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('manage-users', function (User $user) {
            return $user->hasPermissionTo('manage users');
        });

        Gate::define('manage-collaborateurs', function (User $user) {
            return $user->hasPermissionTo('manage collaborateurs');
        });

        Gate::define('check-role', function (User $user, string $role) {
            return $user->hasRole($role);
        });

        // Gate::define('manage-something-else', function (User $user) {
        //     return $user->hasRole('admin');
        // });
    }
}
