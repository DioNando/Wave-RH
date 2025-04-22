<?php

namespace Database\Seeders\Data;

use App\Models\Pays;

class CertificationData
{
    public static function getData(): array
    {
        return [
            // Certifications Cloud
            [
                'titre' => 'AWS Certified Solutions Architect',
                'organisme' => 'Amazon Web Services',
                'pays_id' => Pays::where('nom', 'France')->first()->id ?? Pays::factory()->create(['nom' => 'France'])->id,
                'date_obtention' => '2023-12-01',
                'date_expiration' => '2026-12-01',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Google Cloud Professional Developer',
                'organisme' => 'Google Cloud',
                'pays_id' => Pays::where('nom', 'Allemagne')->first()->id ?? Pays::factory()->create(['nom' => 'Allemagne'])->id,
                'date_obtention' => '2023-10-15',
                'date_expiration' => '2026-10-15',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Microsoft Azure Developer Associate',
                'organisme' => 'Microsoft',
                'pays_id' => Pays::where('nom', 'Royaume-Uni')->first()->id ?? Pays::factory()->create(['nom' => 'Royaume-Uni'])->id,
                'date_obtention' => '2023-08-20',
                'date_expiration' => '2026-08-20',
                'document_path' => null,
                'statut' => true
            ],

            // Certifications DevOps
            [
                'titre' => 'Docker Certified Associate',
                'organisme' => 'Docker Inc.',
                'pays_id' => Pays::where('nom', 'Espagne')->first()->id ?? Pays::factory()->create(['nom' => 'Espagne'])->id,
                'date_obtention' => '2023-11-10',
                'date_expiration' => '2026-11-10',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Certified Kubernetes Administrator',
                'organisme' => 'Cloud Native Computing Foundation',
                'pays_id' => Pays::where('nom', 'Italie')->first()->id ?? Pays::factory()->create(['nom' => 'Italie'])->id,
                'date_obtention' => '2023-09-25',
                'date_expiration' => '2026-09-25',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Jenkins Certified Engineer',
                'organisme' => 'CloudBees',
                'pays_id' => Pays::where('nom', 'Maroc')->first()->id ?? Pays::factory()->create(['nom' => 'Maroc'])->id,
                'date_obtention' => '2023-07-15',
                'date_expiration' => '2026-07-15',
                'document_path' => null,
                'statut' => true
            ],

            // Certifications Développement
            [
                'titre' => 'Oracle Certified Professional Java Developer',
                'organisme' => 'Oracle',
                'pays_id' => Pays::where('nom', 'France')->first()->id ?? Pays::factory()->create(['nom' => 'France'])->id,
                'date_obtention' => '2023-10-30',
                'date_expiration' => '2026-10-30',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'React Certified Developer',
                'organisme' => 'Meta',
                'pays_id' => Pays::where('nom', 'Allemagne')->first()->id ?? Pays::factory()->create(['nom' => 'Allemagne'])->id,
                'date_obtention' => '2023-08-12',
                'date_expiration' => '2026-08-12',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Flutter Certified Developer',
                'organisme' => 'Google',
                'pays_id' => Pays::where('nom', 'Royaume-Uni')->first()->id ?? Pays::factory()->create(['nom' => 'Royaume-Uni'])->id,
                'date_obtention' => '2023-06-20',
                'date_expiration' => '2026-06-20',
                'document_path' => null,
                'statut' => true
            ],

            // Certifications Cybersécurité
            [
                'titre' => 'Certified Ethical Hacker',
                'organisme' => 'EC-Council',
                'pays_id' => Pays::where('nom', 'Espagne')->first()->id ?? Pays::factory()->create(['nom' => 'Espagne'])->id,
                'date_obtention' => '2023-11-25',
                'date_expiration' => '2026-11-25',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'CompTIA Security+',
                'organisme' => 'CompTIA',
                'pays_id' => Pays::where('nom', 'Italie')->first()->id ?? Pays::factory()->create(['nom' => 'Italie'])->id,
                'date_obtention' => '2023-09-18',
                'date_expiration' => '2026-09-18',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'CISSP - Certified Information Systems Security Professional',
                'organisme' => 'ISC²',
                'pays_id' => Pays::where('nom', 'Maroc')->first()->id ?? Pays::factory()->create(['nom' => 'Maroc'])->id,
                'date_obtention' => '2023-07-30',
                'date_expiration' => '2026-07-30',
                'document_path' => null,
                'statut' => true
            ],

            // Certifications Data Science
            [
                'titre' => 'TensorFlow Developer Certificate',
                'organisme' => 'Google',
                'pays_id' => Pays::where('nom', 'France')->first()->id ?? Pays::factory()->create(['nom' => 'France'])->id,
                'date_obtention' => '2023-10-05',
                'date_expiration' => '2026-10-05',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'IBM Data Science Professional Certificate',
                'organisme' => 'IBM',
                'pays_id' => Pays::where('nom', 'Allemagne')->first()->id ?? Pays::factory()->create(['nom' => 'Allemagne'])->id,
                'date_obtention' => '2023-08-28',
                'date_expiration' => '2026-08-28',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Microsoft Power BI Data Analyst Associate',
                'organisme' => 'Microsoft',
                'pays_id' => Pays::where('nom', 'Royaume-Uni')->first()->id ?? Pays::factory()->create(['nom' => 'Royaume-Uni'])->id,
                'date_obtention' => '2023-06-15',
                'date_expiration' => '2026-06-15',
                'document_path' => null,
                'statut' => true
            ],

            // Certifications UI/UX
            [
                'titre' => 'Google UX Design Professional Certificate',
                'organisme' => 'Google',
                'pays_id' => Pays::where('nom', 'Espagne')->first()->id ?? Pays::factory()->create(['nom' => 'Espagne'])->id,
                'date_obtention' => '2023-11-15',
                'date_expiration' => '2026-11-15',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Adobe Certified Expert - XD',
                'organisme' => 'Adobe',
                'pays_id' => Pays::where('nom', 'Italie')->first()->id ?? Pays::factory()->create(['nom' => 'Italie'])->id,
                'date_obtention' => '2023-09-20',
                'date_expiration' => '2026-09-20',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Figma Certified Professional',
                'organisme' => 'Figma',
                'pays_id' => Pays::where('nom', 'Maroc')->first()->id ?? Pays::factory()->create(['nom' => 'Maroc'])->id,
                'date_obtention' => '2023-07-25',
                'date_expiration' => '2026-07-25',
                'document_path' => null,
                'statut' => true
            ],

            // Certifications Marketing Digital
            [
                'titre' => 'Google Digital Marketing & E-commerce Professional Certificate',
                'organisme' => 'Google',
                'pays_id' => Pays::where('nom', 'France')->first()->id ?? Pays::factory()->create(['nom' => 'France'])->id,
                'date_obtention' => '2023-10-20',
                'date_expiration' => '2026-10-20',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'HubSpot Marketing Certification',
                'organisme' => 'HubSpot',
                'pays_id' => Pays::where('nom', 'Allemagne')->first()->id ?? Pays::factory()->create(['nom' => 'Allemagne'])->id,
                'date_obtention' => '2023-08-30',
                'date_expiration' => '2026-08-30',
                'document_path' => null,
                'statut' => true
            ],
            [
                'titre' => 'Meta Blueprint Certification',
                'organisme' => 'Meta',
                'pays_id' => Pays::where('nom', 'Royaume-Uni')->first()->id ?? Pays::factory()->create(['nom' => 'Royaume-Uni'])->id,
                'date_obtention' => '2023-06-28',
                'date_expiration' => '2026-06-28',
                'document_path' => null,
                'statut' => true
            ]
        ];
    }
}
