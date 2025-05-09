<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Seeder des rôles et permissions
            RoleSeeder::class,

            // Seeder des utilisateurs
            UserSeeder::class,

            // Seeder des données géographiques
            GeographicSeeder::class,

            // Seeder des départements et postes
            DepartementPosteSeeder::class,

            // Seeder des types de documents
            TypeDocumentSeeder::class,

            // Seeder des collaborateurs et leurs relations
            CollaborateurSeeder::class,

            // Seeder des langues
            LangueSeeder::class,

            // Seeder des compétences techniques
            CompetenceTechniqueSeeder::class,

            // Seeder des jours fériés
            JourFerieSeeder::class,

            // Seeders des historiques
            HistoriquePosteSeeder::class,
            HistoriqueCongeSeeder::class,
        ]);
    }
}
