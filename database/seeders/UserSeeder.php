<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un utilisateur pour chaque rôle
        foreach (UserRole::all() as $role) {
            $user = User::factory()->create([
            'nom' => 'User ' . $role->value,
            'prenom' => ucfirst($role->value),
            'email' => $role->value . '@wave.com',
            'statut' => true,
            ]);
            
            $user->assignRole($role->value);
        }
    }
}
