<?php

namespace Database\Seeders;

use App\Models\JourFerie;
use Database\Seeders\Data\JourFerieData;
use Illuminate\Database\Seeder;

class JourFerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $joursFeriesData = JourFerieData::getData();

        foreach ($joursFeriesData as $jourFerieData) {
            JourFerie::create($jourFerieData);
        }
    }
}
