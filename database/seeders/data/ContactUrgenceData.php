<?php

namespace Database\Seeders\Data;

use App\Models\Ville;

class ContactUrgenceData
{
    public static function getData(): array
    {
        return [
            // Contacts d'urgence à Madagascar
            [
                'nom' => 'Jean Dupont',
                'telephone' => '+261 34 56 789 01',
                'email' => 'marie.dupont@example.com',
                'relation' => 'Conjoint',
                'adresse_complete' => 'Lot II A 123 Ambohimanambola',
                'ville_id' => Ville::where('nom', 'Antananarivo')->first()->id ?? Ville::factory()->create(['nom' => 'Antananarivo'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Rakoto',
                'telephone' => '+261 32 45 678 90',
                'email' => 'andry.rakoto@example.com',
                'relation' => 'Frère',
                'adresse_complete' => 'Lot III B 456 Ambohimanambola',
                'ville_id' => Ville::where('nom', 'Antananarivo')->first()->id ?? Ville::factory()->create(['nom' => 'Antananarivo'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Rasoa',
                'telephone' => '+261 33 12 345 67',
                'email' => 'lala.rasoa@example.com',
                'relation' => 'Sœur',
                'adresse_complete' => 'Lot IV C 789 Ambohimanambola',
                'ville_id' => Ville::where('nom', 'Antananarivo')->first()->id ?? Ville::factory()->create(['nom' => 'Antananarivo'])->id,
                'statut' => true
            ],

            // Contacts d'urgence au Maroc
            [
                'nom' => 'Alami Hassan',
                'telephone' => '+212 6XX-123456',
                'email' => 'hassan.alami@example.com',
                'relation' => 'Père',
                'adresse_complete' => 'Rue Hassan II 45, Rabat',
                'ville_id' => Ville::where('nom', 'Rabat')->first()->id ?? Ville::factory()->create(['nom' => 'Rabat'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Benzarti Fatima',
                'telephone' => '+212 6XX-234567',
                'email' => 'fatima.benzarti@example.com',
                'relation' => 'Mère',
                'adresse_complete' => 'Avenue Mohammed V 78, Casablanca',
                'ville_id' => Ville::where('nom', 'Casablanca')->first()->id ?? Ville::factory()->create(['nom' => 'Casablanca'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Chraibi Younes',
                'telephone' => '+212 6XX-345678',
                'email' => 'younes.chraibi@example.com',
                'relation' => 'Frère',
                'adresse_complete' => 'Boulevard Zerktouni 12, Marrakech',
                'ville_id' => Ville::where('nom', 'Marrakech')->first()->id ?? Ville::factory()->create(['nom' => 'Marrakech'])->id,
                'statut' => true
            ],

            // Contacts d'urgence en France
            [
                'nom' => 'Martin Sophie',
                'telephone' => '+33 6 12 34 56 78',
                'email' => 'sophie.martin@example.com',
                'relation' => 'Conjoint',
                'adresse_complete' => '15 Rue de Rivoli, Paris',
                'ville_id' => Ville::where('nom', 'Paris')->first()->id ?? Ville::factory()->create(['nom' => 'Paris'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Dubois Pierre',
                'telephone' => '+33 6 23 45 67 89',
                'email' => 'pierre.dubois@example.com',
                'relation' => 'Père',
                'adresse_complete' => '8 Avenue des Champs-Élysées, Paris',
                'ville_id' => Ville::where('nom', 'Paris')->first()->id ?? Ville::factory()->create(['nom' => 'Paris'])->id,
                'statut' => true
            ],

            // Contacts d'urgence en Allemagne
            [
                'nom' => 'Weber Thomas',
                'telephone' => '+49 151 23456789',
                'email' => 'thomas.weber@example.com',
                'relation' => 'Frère',
                'adresse_complete' => 'Hauptstraße 23, Munich',
                'ville_id' => Ville::where('nom', 'Munich')->first()->id ?? Ville::factory()->create(['nom' => 'Munich'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Müller Anna',
                'telephone' => '+49 151 34567890',
                'email' => 'anna.muller@example.com',
                'relation' => 'Sœur',
                'adresse_complete' => 'Bahnhofstraße 45, Stuttgart',
                'ville_id' => Ville::where('nom', 'Stuttgart')->first()->id ?? Ville::factory()->create(['nom' => 'Stuttgart'])->id,
                'statut' => true
            ],

            // Contacts d'urgence en Espagne
            [
                'nom' => 'García Carlos',
                'telephone' => '+34 612 345 678',
                'email' => 'carlos.garcia@example.com',
                'relation' => 'Cousin',
                'adresse_complete' => 'Calle Mayor 67, Madrid',
                'ville_id' => Ville::where('nom', 'Madrid')->first()->id ?? Ville::factory()->create(['nom' => 'Madrid'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Rodriguez Maria',
                'telephone' => '+34 623 456 789',
                'email' => 'maria.rodriguez@example.com',
                'relation' => 'Tante',
                'adresse_complete' => 'Avinguda Diagonal 89, Barcelone',
                'ville_id' => Ville::where('nom', 'Barcelone')->first()->id ?? Ville::factory()->create(['nom' => 'Barcelone'])->id,
                'statut' => true
            ],

            // Contacts d'urgence au Royaume-Uni
            [
                'nom' => 'Smith John',
                'telephone' => '+44 7911 123456',
                'email' => 'john.smith@example.com',
                'relation' => 'Oncle',
                'adresse_complete' => '10 Downing Street, Londres',
                'ville_id' => Ville::where('nom', 'Londres')->first()->id ?? Ville::factory()->create(['nom' => 'Londres'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Brown Sarah',
                'telephone' => '+44 7911 234567',
                'email' => 'sarah.brown@example.com',
                'relation' => 'Tante',
                'adresse_complete' => '15 Royal Mile, Édimbourg',
                'ville_id' => Ville::where('nom', 'Édimbourg')->first()->id ?? Ville::factory()->create(['nom' => 'Édimbourg'])->id,
                'statut' => true
            ],

            // Contacts d'urgence en Italie
            [
                'nom' => 'Rossi Marco',
                'telephone' => '+39 312 345 678',
                'email' => 'marco.rossi@example.com',
                'relation' => 'Cousin',
                'adresse_complete' => 'Via Roma 23, Milan',
                'ville_id' => Ville::where('nom', 'Milan')->first()->id ?? Ville::factory()->create(['nom' => 'Milan'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Ferrari Laura',
                'telephone' => '+39 323 456 789',
                'email' => 'laura.ferrari@example.com',
                'relation' => 'Amie',
                'adresse_complete' => 'Piazza San Marco 45, Rome',
                'ville_id' => Ville::where('nom', 'Rome')->first()->id ?? Ville::factory()->create(['nom' => 'Rome'])->id,
                'statut' => true
            ],

            // Contacts d'urgence au Portugal
            [
                'nom' => 'Silva João',
                'telephone' => '+351 912 345 678',
                'email' => 'joao.silva@example.com',
                'relation' => 'Cousin',
                'adresse_complete' => 'Rua Augusta 45, Lisbonne',
                'ville_id' => Ville::where('nom', 'Lisbonne')->first()->id ?? Ville::factory()->create(['nom' => 'Lisbonne'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Costa Maria',
                'telephone' => '+351 923 456 789',
                'email' => 'maria.costa@example.com',
                'relation' => 'Amie',
                'adresse_complete' => 'Avenida da Liberdade 12, Porto',
                'ville_id' => Ville::where('nom', 'Porto')->first()->id ?? Ville::factory()->create(['nom' => 'Porto'])->id,
                'statut' => true
            ],

            // Contacts d'urgence en Chine
            [
                'nom' => 'Li Wei',
                'telephone' => '+86 138 1234 5678',
                'email' => 'wei.li@example.com',
                'relation' => 'Collègue',
                'adresse_complete' => 'Nanjing Road 88, Shanghai',
                'ville_id' => Ville::where('nom', 'Shanghai')->first()->id ?? Ville::factory()->create(['nom' => 'Shanghai'])->id,
                'statut' => true
            ],
            [
                'nom' => 'Zhang Min',
                'telephone' => '+86 139 2345 6789',
                'email' => 'min.zhang@example.com',
                'relation' => 'Amie',
                'adresse_complete' => 'Chang\'an Avenue 56, Pékin',
                'ville_id' => Ville::where('nom', 'Pékin')->first()->id ?? Ville::factory()->create(['nom' => 'Pékin'])->id,
                'statut' => true
            ]
        ];
    }
}
