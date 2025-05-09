<?php

namespace Database\Seeders;

use App\Models\Certification;
use App\Models\Collaborateur;
use App\Models\ContactUrgence;
use App\Models\ContratTravail;
use App\Models\Diplome;
use App\Models\DocumentAdministratif;
use App\Models\InformationBancaire;
use App\Models\Langue;
use App\Models\CompetenceTechnique;
use App\Models\TypeDocument;
use App\Enums\LangueNiveau;
use Carbon\Carbon;
use Database\Seeders\Data\CertificationData;
use Database\Seeders\Data\CollaborateurData;
use Database\Seeders\Data\ContactUrgenceData;
use Database\Seeders\Data\ContratTravailData;
use Database\Seeders\Data\DiplomeData;
use Database\Seeders\Data\DocumentAdministratifData;
use Database\Seeders\Data\InformationBancaireData;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CollaborateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collaborateursData = CollaborateurData::getData();
        $contactsUrgencesData = ContactUrgenceData::getData();
        $contratsTravailsData = ContratTravailData::getData();
        $diplomesData = DiplomeData::getData();
        $certificationsData = CertificationData::getData();
        $informationsBancairesData = InformationBancaireData::getData();
        $documentsAdministratifsData = DocumentAdministratifData::getData();
        $faker = Faker::create();

        foreach ($collaborateursData as $collaborateurData) {
            // Sauvegarder les langues et compétences techniques avant de créer le collaborateur
            $languesNoms = json_decode($collaborateurData['langues'] ?? '[]', true);
            $competencesNoms = json_decode($collaborateurData['competences_techniques'] ?? '[]', true);

            // Supprimer les colonnes langues et competences_techniques des données (elles sont maintenant gérées par les relations)
            unset($collaborateurData['langues']);
            unset($collaborateurData['competences_techniques']);

            // Créer le collaborateur
            $collaborateur = Collaborateur::create($collaborateurData);

            // Associer les langues au collaborateur
            if (!empty($languesNoms)) {
                foreach ($languesNoms as $langueNom) {
                    $langue = \App\Models\Langue::where('nom', 'like', "%$langueNom%")->first();
                    if ($langue) {
                        $collaborateur->langues()->attach($langue->id, [
                            'niveau' => fake()->randomElement([
                                LangueNiveau::DEBUTANT->value,
                                LangueNiveau::INTERMEDIAIRE->value,
                                LangueNiveau::AVANCE->value,
                                LangueNiveau::COURANT->value,
                                LangueNiveau::NATIF->value
                            ])
                        ]);
                    }
                }
            }

            // Associer les compétences techniques au collaborateur
            if (!empty($competencesNoms)) {
                foreach ($competencesNoms as $competenceNom) {
                    $competence = \App\Models\CompetenceTechnique::where('nom', 'like', "%$competenceNom%")->first();
                    if ($competence) {
                        $collaborateur->competencesTechniques()->attach($competence->id, [
                            'niveau' => fake()->numberBetween(1, 5),
                            'notes' => fake()->optional(0.3)->sentence()
                        ]);
                    }
                }
            }

            // Créer 1 à 3 contacts d'urgence pour le collaborateur
            $nbContacts = rand(1, 3);
            for ($i = 0; $i < $nbContacts; $i++) {
                $contactData = $contactsUrgencesData[array_rand($contactsUrgencesData)];
                $contactData['collaborateur_id'] = $collaborateur->id;
                ContactUrgence::create($contactData);
            }

            // Créer 1 à 2 contrats de travail pour le collaborateur
            $nbContrats = rand(1, 2);
            for ($i = 0; $i < $nbContrats; $i++) {
                $contratData = $contratsTravailsData[array_rand($contratsTravailsData)];
                $contratData['collaborateur_id'] = $collaborateur->id;
                ContratTravail::create($contratData);
            }

            // Créer 1 à 3 diplômes pour le collaborateur
            $nbDiplomes = rand(1, 3);
            for ($i = 0; $i < $nbDiplomes; $i++) {
                $diplomeData = $diplomesData[array_rand($diplomesData)];
                $diplomeData['collaborateur_id'] = $collaborateur->id;
                $diplomeData['pays_id'] = $collaborateur->pays_id;
                Diplome::create($diplomeData);
            }

            // Créer 1 à 2 certifications pour le collaborateur
            $nbCertifications = rand(1, 5);
            for ($i = 0; $i < $nbCertifications; $i++) {
                $certificationData = $certificationsData[array_rand($certificationsData)];
                $certificationData['collaborateur_id'] = $collaborateur->id;
                Certification::create($certificationData);
            }

            // Créer 1 à 2 informations bancaires pour le collaborateur
            $nbInfosBancaires = rand(1, 3);
            for ($i = 0; $i < $nbInfosBancaires; $i++) {
                $infoBancaireData = $informationsBancairesData[array_rand($informationsBancairesData)];
                $infoBancaireData['collaborateur_id'] = $collaborateur->id;
                $infoBancaireData['titulaire_compte'] = $collaborateur->nom . ' ' . $collaborateur->prenom;
                InformationBancaire::create($infoBancaireData);
            }

            // Créer 3 à 6 documents administratifs pour le collaborateur
            $nbDocuments = rand(3, 6);
            for ($i = 0; $i < $nbDocuments; $i++) {
                $documentData = $documentsAdministratifsData[array_rand($documentsAdministratifsData)];
                $documentData['collaborateur_id'] = $collaborateur->id;

                // Sélectionner un type de document aléatoire
                $typeDocument = TypeDocument::inRandomOrder()->first();
                $documentData['type_document_id'] = $typeDocument->id;

                // Générer une date d'émission aléatoire entre 2023 et 2024 (ou null)
                $dateEmission = rand(0, 5) > 0 ? Carbon::create(
                    rand(2023, 2024),
                    rand(1, 12),
                    rand(1, 28)
                ) : null;

                // Générer une date d'expiration en fonction du type de document
                if ($dateEmission) {
                    $dateExpiration = match ($typeDocument->libelle) {
                        'CV' => $dateEmission->copy()->addYear(),
                        'CIN' => $dateEmission->copy()->addYears(5),
                        'CNSS' => $dateEmission->copy()->addYear(),
                        'Contrat de travail' => $dateEmission->copy()->addYear(),
                        'Bulletin de paie' => $dateEmission->copy()->addMonth(),
                        'Document médical' => $dateEmission->copy()->addYear(),
                        'RIB' => $dateEmission->copy()->addYear(),
                        'Permis de conduire' => $dateEmission->copy()->addYears(3),
                        'Attestation de formation' => $dateEmission->copy()->addYear(),
                        'Contrat de confidentialité' => $dateEmission->copy()->addYear(),
                        default => $dateEmission->copy()->addYear()
                    };
                    $documentData['date_emission'] = $dateEmission->format('Y-m-d');
                    $documentData['date_expiration'] = $dateExpiration->format('Y-m-d');
                } else {
                    $documentData['date_emission'] = null;
                    // Même sans date d'émission, on génère une date d'expiration
                    $dateExpiration = Carbon::now()->addYear();
                    $documentData['date_expiration'] = $dateExpiration->format('Y-m-d');
                }

                DocumentAdministratif::create($documentData);
            }
        }
    }
}
