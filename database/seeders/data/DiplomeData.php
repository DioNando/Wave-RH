<?php

namespace Database\Seeders\Data;

use App\Enums\DiplomeNiveau;

class DiplomeData
{
    public static function getData(): array
    {
        return [
            // Diplômes en Informatique et Technologies
            [
                'titre' => 'Master en Informatique',
                'etablissement' => 'Université d\'Antananarivo',
                'date_obtention' => '2023-07-15',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Master en Intelligence Artificielle',
                'etablissement' => 'Université de Shanghai',
                'date_obtention' => '2022-06-20',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Développement Logiciel',
                'etablissement' => 'Université de Bangalore',
                'date_obtention' => '2021-05-10',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Doctorat en Informatique',
                'etablissement' => 'Université de Munich',
                'date_obtention' => '2020-12-15',
                'niveau' => DiplomeNiveau::DOCTORAT->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes en Finance et Gestion
            [
                'titre' => 'Master en Finance',
                'etablissement' => 'Université de Barcelone',
                'date_obtention' => '2019-06-30',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Master en Comptabilité',
                'etablissement' => 'Université de Lyon',
                'date_obtention' => '2018-07-20',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Gestion Financière',
                'etablissement' => 'Université de Lisbonne',
                'date_obtention' => '2017-05-15',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes en Ressources Humaines
            [
                'titre' => 'Master en Gestion des Ressources Humaines',
                'etablissement' => 'Université de Toamasina',
                'date_obtention' => '2021-08-25',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Psychologie du Travail',
                'etablissement' => 'Université d\'Antsirabe',
                'date_obtention' => '2020-06-30',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes en Marketing et Communication
            [
                'titre' => 'Master en Marketing Digital',
                'etablissement' => 'Université de Madrid',
                'date_obtention' => '2022-07-10',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Communication',
                'etablissement' => 'Université de Paris',
                'date_obtention' => '2021-06-15',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes en Design et UX
            [
                'titre' => 'Master en Design d\'Interface',
                'etablissement' => 'Université de Stuttgart',
                'date_obtention' => '2023-06-20',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Design Graphique',
                'etablissement' => 'Université de Milan',
                'date_obtention' => '2022-05-30',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes en Juridique
            [
                'titre' => 'Master en Droit des Affaires',
                'etablissement' => 'Université de Londres',
                'date_obtention' => '2020-07-15',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Droit International',
                'etablissement' => 'Université de Rabat',
                'date_obtention' => '2019-06-20',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes en Production et Logistique
            [
                'titre' => 'Master en Gestion de la Production',
                'etablissement' => 'Université de Fianarantsoa',
                'date_obtention' => '2021-08-30',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Logistique',
                'etablissement' => 'Université de Casablanca',
                'date_obtention' => '2020-07-10',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes en Recherche et Développement
            [
                'titre' => 'Doctorat en Biotechnologie',
                'etablissement' => 'Université d\'Édimbourg',
                'date_obtention' => '2019-12-15',
                'niveau' => DiplomeNiveau::DOCTORAT->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Master en Recherche Clinique',
                'etablissement' => 'Université de Marrakech',
                'date_obtention' => '2018-06-25',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],

            // Diplômes de base
            [
                'titre' => 'Baccalauréat Scientifique',
                'etablissement' => 'Lycée Saint Michel',
                'date_obtention' => '2018-07-15',
                'niveau' => DiplomeNiveau::BAC->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Baccalauréat Économique et Social',
                'etablissement' => 'Lycée Victor Hugo',
                'date_obtention' => '2017-06-20',
                'niveau' => DiplomeNiveau::BAC->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Baccalauréat Littéraire',
                'etablissement' => 'Lycée Jules Ferry',
                'date_obtention' => '2016-07-10',
                'niveau' => DiplomeNiveau::BAC->value,
                'document_path' => null,
                'statut' => true
            ],

            [
                'titre' => 'Master en Gestion des Ressources Humaines',
                'etablissement' => 'Université Mohammed V de Rabat',
                'date_obtention' => '2022-06-30',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Droit',
                'etablissement' => 'Université de Paris 1 Panthéon-Sorbonne',
                'date_obtention' => '2020-07-10',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Master en Finance et Comptabilité',
                'etablissement' => 'Université de Barcelone',
                'date_obtention' => '2021-06-25',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Baccalauréat Économique et Social',
                'etablissement' => 'Lycée Louis-le-Grand',
                'date_obtention' => '2017-07-01',
                'niveau' => DiplomeNiveau::BAC->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Design Graphique',
                'etablissement' => 'Université de Florence',
                'date_obtention' => '2019-07-20',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Master en Marketing Digital',
                'etablissement' => 'Université de Munich',
                'date_obtention' => '2023-06-15',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'BTS Gestion de la PME',
                'etablissement' => 'Lycée Technique de Casablanca',
                'date_obtention' => '2020-06-30',
                'niveau' => DiplomeNiveau::BTS->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Licence en Génie Civil',
                'etablissement' => 'Université de Séville',
                'date_obtention' => '2022-07-05',
                'niveau' => DiplomeNiveau::LICENCE->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Master en Sciences de l’Environnement',
                'etablissement' => 'Université d’Édimbourg',
                'date_obtention' => '2021-08-10',
                'niveau' => DiplomeNiveau::MASTER->value,
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Baccalauréat Littéraire',
                'etablissement' => 'Lycée Jean Jaurès',
                'date_obtention' => '2016-06-28',
                'niveau' => DiplomeNiveau::BAC->value,
                'document_path' => null,
                'statut' => true
            ]
        ];
    }
}
