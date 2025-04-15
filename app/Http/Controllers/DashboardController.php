<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Le middleware auth est déjà appliqué au niveau des routes
    }

    /**
     * Affiche le dashboard correspondant au rôle de l'utilisateur
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        return match ($role) {
            UserRole::ADMIN => view('pages.admin.dashboard'),
            UserRole::USER => view('pages.user.dashboard'),
            // Ajoutez d'autres cas au besoin
            default => view('pages.user.dashboard'),
        };
    }

    /**
     * Affiche la page des paramètres
     */
    public function settings()
    {
        $user = Auth::user();
        $role = $user->role;

        return match ($role) {
            default => view('pages.settings'),
        };
    }

    /**
     * Affiche la page de profil de l'utilisateur
     */
    public function profile()
    {
        return view('pages.user.profile');
    }

    /**
     * Affiche la page d'exemples de composants UI
     */
    public function example()
    {
        return view('pages.examples-ui');
    }
}
