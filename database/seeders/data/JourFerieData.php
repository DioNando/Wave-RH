<?php

namespace Database\Seeders\Data;

use App\Enums\TypeJourFerie;
use Carbon\Carbon;

class JourFerieData
{
    public static function getData(): array
    {
        $currentYear = Carbon::now()->year;

        return [
            // Jours fériés nationaux (récurrents)
            [
                'nom' => 'Jour de l\'An',
                'description' => 'Jour férié célébrant le premier jour de l\'année',
                'date' => Carbon::createFromDate($currentYear, 1, 1)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Fête du Travail',
                'description' => 'Célébration internationale des droits des travailleurs',
                'date' => Carbon::createFromDate($currentYear, 5, 1)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Fête de l\'Indépendance',
                'description' => 'Célébration de l\'indépendance nationale',
                'date' => Carbon::createFromDate($currentYear, 6, 26)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Fête de la République',
                'description' => 'Commémoration de la proclamation de la République',
                'date' => Carbon::createFromDate($currentYear, 10, 14)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Noël',
                'description' => 'Fête de la nativité chrétienne',
                'date' => Carbon::createFromDate($currentYear, 12, 25)->format('Y-m-d'),
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],

            // Jours fériés religieux (certains sont mobiles, donc non récurrents à date fixe)
            [
                'nom' => 'Pâques',
                'description' => 'Célébration de la résurrection du Christ',
                'date' => Carbon::createFromDate($currentYear, 4, 9)->format('Y-m-d'), // Date variable chaque année
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Lundi de Pâques',
                'description' => 'Jour férié suivant le dimanche de Pâques',
                'date' => Carbon::createFromDate($currentYear, 4, 10)->format('Y-m-d'), // Date variable chaque année
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Ascension',
                'description' => 'Fête chrétienne célébrant l\'élévation de Jésus au ciel',
                'date' => Carbon::createFromDate($currentYear, 5, 18)->format('Y-m-d'), // Date variable chaque année
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Pentecôte',
                'description' => 'Fête chrétienne célébrant la descente du Saint-Esprit',
                'date' => Carbon::createFromDate($currentYear, 5, 28)->format('Y-m-d'), // Date variable chaque année
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Lundi de Pentecôte',
                'description' => 'Jour férié suivant le dimanche de Pentecôte',
                'date' => Carbon::createFromDate($currentYear, 5, 29)->format('Y-m-d'), // Date variable chaque année
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Assomption',
                'description' => 'Célébration catholique de l\'élévation de la Vierge Marie au ciel',
                'date' => Carbon::createFromDate($currentYear, 8, 15)->format('Y-m-d'),
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Toussaint',
                'description' => 'Fête de tous les saints de la chrétienté',
                'date' => Carbon::createFromDate($currentYear, 11, 1)->format('Y-m-d'),
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],

            // Jours fériés spécifiques à l'année en cours (non récurrents)
            [
                'nom' => 'Journée de solidarité',
                'description' => 'Journée spéciale dédiée à la solidarité nationale',
                'date' => Carbon::createFromDate($currentYear, 9, 5)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Journée de l\'entreprise',
                'description' => 'Journée dédiée à la célébration de l\'entreprise',
                'date' => Carbon::createFromDate($currentYear, 3, 15)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => false,
                'est_confirme' => false, // Non confirmé
                'statut' => true,
            ],

            // Jours fériés musulmans (dates variables selon le calendrier lunaire islamique)
            [
                'nom' => 'Aïd al-Fitr',
                'description' => 'Fête de la rupture du jeûne marquant la fin du Ramadan',
                'date' => Carbon::createFromDate($currentYear, 4, 21)->format('Y-m-d'), // Date approximative pour l'année en cours
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Aïd al-Adha',
                'description' => 'Fête du sacrifice commémorant la soumission d\'Abraham à Dieu',
                'date' => Carbon::createFromDate($currentYear, 6, 28)->format('Y-m-d'), // Date approximative pour l'année en cours
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Al-Hijra',
                'description' => 'Nouvel an musulman marquant le début du calendrier islamique',
                'date' => Carbon::createFromDate($currentYear, 7, 19)->format('Y-m-d'), // Date approximative pour l'année en cours
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Achoura',
                'description' => 'Jour de jeûne et de commémoration dans l\'islam',
                'date' => Carbon::createFromDate($currentYear, 7, 28)->format('Y-m-d'), // Date approximative pour l'année en cours
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Mawlid',
                'description' => 'Commémoration de la naissance du prophète Mahomet',
                'date' => Carbon::createFromDate($currentYear, 9, 27)->format('Y-m-d'), // Date approximative pour l'année en cours
                'type' => TypeJourFerie::RELIGIEUX,
                'est_recurrent' => false,
                'est_confirme' => true,
                'statut' => true,
            ],

            // Jours fériés marocains
            [
                'nom' => 'Fête du Trône',
                'description' => 'Commémoration de l\'intronisation du Roi du Maroc',
                'date' => Carbon::createFromDate($currentYear, 7, 30)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Fête de la Révolution du Roi et du Peuple',
                'description' => 'Commémoration de la révolution du roi et du peuple contre la colonisation',
                'date' => Carbon::createFromDate($currentYear, 8, 20)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Fête de la Jeunesse',
                'description' => 'Célébration de l\'anniversaire du Roi',
                'date' => Carbon::createFromDate($currentYear, 8, 21)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Fête de la Marche Verte',
                'description' => 'Commémoration de la Marche Verte de 1975',
                'date' => Carbon::createFromDate($currentYear, 11, 6)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Fête de l\'Indépendance du Maroc',
                'description' => 'Commémoration de l\'indépendance du Maroc',
                'date' => Carbon::createFromDate($currentYear, 11, 18)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
            [
                'nom' => 'Manifeste de l\'Indépendance',
                'description' => 'Commémoration du Manifeste de l\'Indépendance de 1944',
                'date' => Carbon::createFromDate($currentYear, 1, 11)->format('Y-m-d'),
                'type' => TypeJourFerie::NATIONAL,
                'est_recurrent' => true,
                'est_confirme' => true,
                'statut' => true,
            ],
        ];
    }
}
