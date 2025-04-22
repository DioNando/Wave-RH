<?php

namespace Database\Seeders\Data;

use App\Enums\TypeContratTravail;

class ContratTravailData
{
    public static function getData(): array
    {
        return [
            // Contrats CDI
            [
                'type_contrat' => TypeContratTravail::CDI->value,
                'date_debut' => '2024-01-01',
                'date_fin' => null,
                'salaire' => 2500000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::CDI->value,
                'date_debut' => '2023-06-15',
                'date_fin' => null,
                'salaire' => 3000000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::CDI->value,
                'date_debut' => '2023-01-01',
                'date_fin' => null,
                'salaire' => 3500000,
                'document_path' => null,
                'statut' => true
            ],

            // Contrats CDD
            [
                'type_contrat' => TypeContratTravail::CDD->value,
                'date_debut' => '2024-01-01',
                'date_fin' => '2024-12-31',
                'salaire' => 2000000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::CDD->value,
                'date_debut' => '2024-02-01',
                'date_fin' => '2024-08-31',
                'salaire' => 1800000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::CDD->value,
                'date_debut' => '2024-03-01',
                'date_fin' => '2024-06-30',
                'salaire' => 1500000,
                'document_path' => null,
                'statut' => true
            ],

            // Contrats ANAPEC
            [
                'type_contrat' => TypeContratTravail::ANAPEC->value,
                'date_debut' => '2024-01-15',
                'date_fin' => '2024-07-15',
                'salaire' => 1200000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::ANAPEC->value,
                'date_debut' => '2024-02-01',
                'date_fin' => '2024-08-01',
                'salaire' => 1300000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::ANAPEC->value,
                'date_debut' => '2024-03-01',
                'date_fin' => '2024-09-01',
                'salaire' => 1400000,
                'document_path' => null,
                'statut' => true
            ],

            // Contrats Stage
            [
                'type_contrat' => TypeContratTravail::STAGE->value,
                'date_debut' => '2024-01-01',
                'date_fin' => '2024-06-30',
                'salaire' => 1000000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::STAGE->value,
                'date_debut' => '2024-02-01',
                'date_fin' => '2024-07-31',
                'salaire' => 900000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::STAGE->value,
                'date_debut' => '2024-03-01',
                'date_fin' => '2024-08-31',
                'salaire' => 950000,
                'document_path' => null,
                'statut' => true
            ],

            // Contrats Freelance
            [
                'type_contrat' => TypeContratTravail::FREELANCE->value,
                'date_debut' => '2024-01-01',
                'date_fin' => '2024-03-31',
                'salaire' => 4000000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::FREELANCE->value,
                'date_debut' => '2024-02-01',
                'date_fin' => '2024-04-30',
                'salaire' => 3500000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::FREELANCE->value,
                'date_debut' => '2024-03-01',
                'date_fin' => '2024-05-31',
                'salaire' => 3800000,
                'document_path' => null,
                'statut' => true
            ],

            // Contrats Autre
            [
                'type_contrat' => TypeContratTravail::AUTRE->value,
                'date_debut' => '2024-01-01',
                'date_fin' => '2024-12-31',
                'salaire' => 2800000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::AUTRE->value,
                'date_debut' => '2024-02-01',
                'date_fin' => '2024-08-31',
                'salaire' => 2500000,
                'document_path' => null,
                'statut' => true
            ],
            [
                'type_contrat' => TypeContratTravail::AUTRE->value,
                'date_debut' => '2024-03-01',
                'date_fin' => '2024-09-30',
                'salaire' => 2600000,
                'document_path' => null,
                'statut' => true
            ]
        ];
    }
}
