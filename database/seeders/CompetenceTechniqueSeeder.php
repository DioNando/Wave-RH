<?php

namespace Database\Seeders;

use App\Models\CompetenceTechnique;
use Database\Seeders\Data\CompetenceTechniqueData;
use Illuminate\Database\Seeder;

class CompetenceTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competencesTechniques = CompetenceTechniqueData::getData();

        foreach ($competencesTechniques as $competenceTechnique) {
            CompetenceTechnique::create($competenceTechnique);
        }
    }
}
