<?php

namespace Database\Seeders;

use App\Models\Pays;
use App\Models\Region;
use App\Models\Ville;
use Database\Seeders\Data\GeographicData;
use Illuminate\Database\Seeder;

class GeographicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
}
