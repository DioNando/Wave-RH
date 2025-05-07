<?php

namespace Database\Seeders;

use App\Enums\TypeConge;
use App\Models\Collaborateur;
use App\Models\HistoriqueConge;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HistoriqueCongeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collaborateurs = Collaborateur::all();
        $typesConges = TypeConge::cases();

        foreach ($collaborateurs as $collaborateur) {
            // Générer 2 à 5 congés par collaborateur
            $nombreConges = rand(2, 5);
            $dateEmbauche = Carbon::parse($collaborateur->date_embauche);
            $dateActuelle = Carbon::now();

            for ($i = 0; $i < $nombreConges; $i++) {
                // Sélectionner un type de congé aléatoire
                $typeConge = $typesConges[array_rand($typesConges)];

                // Calculer la durée en fonction du type de congé
                $duree = match($typeConge) {
                    TypeConge::ANNUEL => rand(5, 15),
                    TypeConge::MALADIE => rand(1, 5),
                    TypeConge::MATERNITE => 98,
                    TypeConge::PATERNITE => 15,
                    TypeConge::SANS_SOLDE => rand(1, 10),
                    TypeConge::AUTRE => rand(1, 5),
                };

                // Générer une date de fin aléatoire entre la date d'embauche et maintenant
                $dateFin = Carbon::create(
                    rand($dateEmbauche->year, $dateActuelle->year),
                    rand(1, 12),
                    rand(1, 28)
                );

                // Si la date de fin est après la date actuelle, la corriger
                if ($dateFin->gt($dateActuelle)) {
                    $dateFin = $dateActuelle->copy();
                }

                // Calculer la date de début en soustrayant la durée
                $dateDebut = $dateFin->copy()->subDays($duree);

                // Si la date de début est avant la date d'embauche, ajuster les dates
                if ($dateDebut->lt($dateEmbauche)) {
                    $dateDebut = $dateEmbauche->copy();
                    $dateFin = $dateDebut->copy()->addDays($duree);

                    // Si la nouvelle date de fin est après la date actuelle, ajuster la durée
                    if ($dateFin->gt($dateActuelle)) {
                        $dateFin = $dateActuelle->copy();
                        $duree = $dateDebut->diffInDays($dateFin);
                    }
                }

                // Générer un motif en fonction du type de congé
                $motif = $this->getMotifAleatoire($typeConge);

                // Générer des commentaires aléatoires
                $commentaires = $this->getCommentairesAleatoires();

                HistoriqueConge::create([
                    'collaborateur_id' => $collaborateur->id,
                    'type_conge' => $typeConge->value,
                    'date_debut' => $dateDebut->format('Y-m-d'),
                    'date_fin' => $dateFin->format('Y-m-d'),
                    'duree' => $duree,
                    'motif' => $motif,
                    'commentaires' => $commentaires,
                    'statut' => true,
                ]);
            }
        }
    }

    private function getMotifAleatoire(TypeConge $typeConge): string
    {
        return match($typeConge) {
            TypeConge::ANNUEL => [
                'Vacances d\'été',
                'Vacances d\'hiver',
                'Vacances de printemps',
                'Vacances de fin d\'année',
                'Repos bien mérité',
                'Temps en famille',
            ][array_rand([
                'Vacances d\'été',
                'Vacances d\'hiver',
                'Vacances de printemps',
                'Vacances de fin d\'année',
                'Repos bien mérité',
                'Temps en famille',
            ])],

            TypeConge::MALADIE => [
                'Grippe',
                'Maladie chronique',
                'Accident',
                'Consultation médicale',
                'Rétablissement',
                'Opération',
            ][array_rand([
                'Grippe',
                'Maladie chronique',
                'Accident',
                'Consultation médicale',
                'Rétablissement',
                'Opération',
            ])],

            TypeConge::MATERNITE => 'Congé maternité',
            TypeConge::PATERNITE => 'Congé paternité',
            TypeConge::SANS_SOLDE => [
                'Projet personnel',
                'Formation personnelle',
                'Voyage',
                'Raison familiale',
                'Autre projet',
            ][array_rand([
                'Projet personnel',
                'Formation personnelle',
                'Voyage',
                'Raison familiale',
                'Autre projet',
            ])],

            TypeConge::AUTRE => [
                'Mariage',
                'Décès',
                'Formation professionnelle',
                'Mission personnelle',
                'Autre raison',
            ][array_rand([
                'Mariage',
                'Décès',
                'Formation professionnelle',
                'Mission personnelle',
                'Autre raison',
            ])],
        };
    }

    private function getCommentairesAleatoires(): string
    {
        $commentaires = [
            'Congé approuvé par le manager',
            'Documentation médicale fournie',
            'Remplacé par un collègue',
            'Tâches déléguées',
            'Projet en cours reporté',
            'Formation complétée avec succès',
            'Retour prévu le ' . Carbon::now()->addDays(rand(1, 30))->format('d/m/Y'),
            'Contact d\'urgence disponible',
            'Télétravail possible si nécessaire',
            'Documents administratifs fournis',
        ];

        return $commentaires[array_rand($commentaires)];
    }
}
