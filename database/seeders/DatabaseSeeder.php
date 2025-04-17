<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Departement;
use App\Models\Pays;
use App\Models\Poste;
use App\Models\Region;
use App\Models\TypeDocument;
use App\Models\User;
use App\Models\Ville;
use Database\Seeders\Data\DepartementPosteData;
use Database\Seeders\Data\GeographicData;
use Database\Seeders\Data\TypeDocumentData;
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

        // Créer des pays, régions et villes de manière cohérente
        $this->seedGeographicData();

        // Créer des départements et postes de manière cohérente
        $this->seedDepartementPosteData();

        // Créer les types de documents
        $this->seedTypesDocuments();

        // Créer 20 utilisateurs additionnels avec des rôles aléatoires
        // User::factory()->count(20)->create();
    }

    /**
     * Seed les données géographiques de manière cohérente
     */
    private function seedGeographicData(): void
    {
        // Récupérer les données depuis la classe GeographicData
        $geographicData = GeographicData::getData();

        foreach ($geographicData as $countryData) {
            // Créer le pays
            $pays = Pays::create($countryData['pays']);

            foreach ($countryData['regions'] as $regionData) {
                // Créer la région liée au pays
                $regionInfo = [
                    'nom' => $regionData['nom'],
                    'pays_id' => $pays->id,
                    'statut' => $regionData['statut'],
                ];
                $region = Region::create($regionInfo);

                // Créer les villes liées à la région et au pays
                foreach ($regionData['villes'] as $villeData) {
                    Ville::create([
                        'nom' => $villeData['nom'],
                        'pays_id' => $pays->id,
                        'region_id' => $region->id,
                        'statut' => $villeData['statut'],
                    ]);
                }
            }
        }
    }

    /**
     * Seed les données de départements et postes de manière cohérente
     */
    private function seedDepartementPosteData(): void
    {
        // Récupérer les données depuis la classe DepartementPosteData
        $departementPosteData = DepartementPosteData::getData();

        foreach ($departementPosteData as $depData) {
            // Créer le département
            $departement = Departement::create($depData['departement']);

            // Créer les postes liés au département
            foreach ($depData['postes'] as $posteData) {
                Poste::create([
                    'nom' => $posteData['nom'],
                    'description' => $posteData['description'],
                    'departement_id' => $departement->id,
                    'statut' => $posteData['statut'],
                ]);
            }
        }
    }

    /**
     * Seed les données de type de documents
     */
    private function seedTypesDocuments(): void
    {
        $typesDocumentsData = TypeDocumentData::getData();

        foreach ($typesDocumentsData as $typeDocumentData) {
            TypeDocument::create($typeDocumentData);
        }
    }
}
