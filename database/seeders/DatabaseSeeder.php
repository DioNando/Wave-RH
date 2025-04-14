<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur pour chaque rôle
        foreach (UserRole::all() as $role) {
            User::factory()->create([
                'nom' => 'User ' . $role->value,
                'prenom' => ucfirst($role->value),
                'email' => $role->value . '@wave.com',
                'role' => $role->value,
                'statut' => true,
            ]);
        }
    }
}
