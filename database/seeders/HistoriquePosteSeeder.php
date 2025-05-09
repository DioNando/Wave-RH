<?php

namespace Database\Seeders;

use App\Models\Collaborateur;
use App\Models\HistoriquePoste;
use App\Models\Poste;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HistoriquePosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collaborateurs = Collaborateur::all();
        $postes = Poste::all();

        foreach ($collaborateurs as $collaborateur) {
            // Générer 1 à 3 changements de poste par collaborateur
            $nombreChangements = rand(1, 3);
            $dateDebut = Carbon::parse($collaborateur->date_embauche);

            for ($i = 0; $i < $nombreChangements; $i++) {
                // Si ce n'est pas le premier changement, la date de début est la date de fin du changement précédent
                if ($i > 0) {
                    $dateDebut = $dateFin ?? $dateDebut;
                }

                // Générer une date de fin aléatoire entre la date de début et maintenant
                $dateFin = $i === $nombreChangements - 1
                    ? null // Le dernier changement n'a pas de date de fin (poste actuel)
                    : $dateDebut->copy()->addMonths(rand(3, 24));

                // Sélectionner un poste différent du poste actuel
                $poste = $postes->where('id', '!=', $collaborateur->poste_id)->random();

                HistoriquePoste::create([
                    'collaborateur_id' => $collaborateur->id,
                    'poste_id' => $poste->id,
                    'date_debut' => $dateDebut,
                    'date_fin' => $dateFin,
                    'duree' => $dateFin ? $dateDebut->diffInMonths($dateFin) : null,
                    // 'commentaires' => 'Changement de poste pour le collaborateur ' . $collaborateur->nom,
                    'raison_fin' => $this->getRaisonFinAleatoire(),
                    'statut' => $i === $nombreChangements - 1 ? 1 : 0,
                ]);
            }
        }
    }

    private function getRaisonFinAleatoire(): string
    {
        $motifs = [
            'Promotion',
            'Mutation interne',
            'Changement de département',
            'Évolution de carrière',
            'Réorganisation',
            'Nouveau projet',
            'Besoin en compétences',
            'Rotation des postes',
            'Développement professionnel',
            'Adaptation aux besoins',
        ];

        return $motifs[array_rand($motifs)];
    }
}
