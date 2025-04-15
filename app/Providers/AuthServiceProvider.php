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
        // Définition d'une gate pour vérifier si l'utilisateur est admin
        Gate::define('admin', function (User $user) {
            return $user->role === UserRole::ADMIN;
        });

        // Vous pouvez ajouter d'autres gates pour d'autres fonctionnalités
        Gate::define('manage-users', function (User $user) {
            return $user->role === UserRole::ADMIN;
        });

        // Gate générique pour vérifier n'importe quel rôle
        Gate::define('has-role', function (User $user, string $role) {
            return $user->role->value === $role;
        });

        // Si vous avez besoin d'autres autorisations spécifiques
        // Gate::define('edit-settings', function (User $user) {
        //     return $user->role === UserRole::ADMIN;
        // });
    }
}
