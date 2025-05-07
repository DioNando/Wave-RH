<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Collaborateur;
use App\Models\ContratTravail;
use App\Models\Departement;
use Carbon\Carbon;
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

        // Données communes pour tous les utilisateurs
        $data = [];

        // Statistiques - uniquement pour les administrateurs
        if ($user->hasRole(UserRole::ADMIN->value)) {
            $data['totalCollaborateurs'] = Collaborateur::count();
            $data['salairesVerses'] = ContratTravail::whereMonth('date_debut', Carbon::now()->month)
                ->whereYear('date_debut', Carbon::now()->year)
                ->sum('salaire');
            $data['departementsCount'] = Departement::count();
            $data['heuresSupplementaires'] = 312; // À remplacer par une vraie logique de calcul
        }

        // Liste des collaborateurs - pour tous les utilisateurs
        $collaborateurs = Collaborateur::with(['ville.pays'])
            ->latest()
            ->take(5)
            ->get();

        foreach ($collaborateurs as $collaborateur) {
            $collaborateur->poste_actuel = $collaborateur->historique_postes()
                ->orderBy('date_debut', 'desc')
                ->first();
        }
        $data['collaborateurs'] = $collaborateurs;

        // Activités récentes - pour tous les utilisateurs
        $data['activities'] = [
            [
                'user' => [
                    'name' => 'John Doe',
                    'avatar' => null,
                ],
                'time' => '2h',
                'action' => 'Ajouté un nouveau collaborateur :',
                'highlight' => 'Sarah L.',
                'type' => 'success',
            ],
            [
                'user' => [
                    'name' => 'Alice Dupont',
                    'avatar' => null,
                ],
                'time' => '3h',
                'action' => 'Mis à jour le solde de congés de',
                'highlight' => 'Paul T.',
                'type' => 'info',
            ],
            [
                'user' => [
                    'name' => 'Marc Lefèvre',
                    'avatar' => null,
                ],
                'time' => '5h',
                'action' => 'Créé un nouveau ticket pour la mise à jour du système de gestion des congés.',
                'highlight' => null,
                'type' => 'warning',
            ],
        ];

        // Retourner la vue appropriée en fonction du rôle
        if ($user->hasRole(UserRole::ADMIN->value)) {
            return view('pages.admin.dashboard', $data);
        } else {
            return view('pages.user.dashboard', $data);
        }
    }

    /**
     * Affiche la page des paramètres
     */
    public function settings()
    {
        return view('pages.settings');
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
