<?php

namespace Database\Seeders;

use App\Models\Langue;
use Illuminate\Database\Seeder;
use Database\Seeders\Data\LangueData;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langues = LangueData::getData();

        foreach ($langues as $langue) {
            Langue::create($langue);
        }
    }
}
