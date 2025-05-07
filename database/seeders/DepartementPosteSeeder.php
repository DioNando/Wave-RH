<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Poste;
use Database\Seeders\Data\DepartementPosteData;
use Illuminate\Database\Seeder;

class DepartementPosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
}
