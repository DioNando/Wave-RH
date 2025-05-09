<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Vérification des relations entre les modèles\n";
echo "-------------------------------------------\n\n";

echo "1. Nombre de langues dans la base de données : " . \App\Models\Langue::count() . "\n\n";

echo "2. Langues du premier collaborateur :\n";
$collaborateur = \App\Models\Collaborateur::with('langues')->first();
if ($collaborateur) {
    echo "Collaborateur: " . $collaborateur->nom . " " . $collaborateur->prenom . "\n";
    $collaborateur->langues->each(function($langue) {
        echo "- " . $langue->nom . " (niveau: " . $langue->pivot->niveau . ")\n";
    });
} else {
    echo "Aucun collaborateur trouvé\n";
}

echo "\n3. Nombre de compétences techniques dans la base de données : " . \App\Models\CompetenceTechnique::count() . "\n\n";

echo "4. Compétences techniques du premier collaborateur :\n";
if ($collaborateur) {
    $collaborateur->load('competencesTechniques');
    $collaborateur->competencesTechniques->each(function($competence) {
        echo "- " . $competence->nom . " (niveau: " . $competence->pivot->niveau . ", notes: " .
            ($competence->pivot->notes ?: 'aucune') . ")\n";
    });
} else {
    echo "Aucun collaborateur trouvé\n";
}

echo "\n5. Collaborateurs pour la première langue :\n";
$langue = \App\Models\Langue::with('collaborateurs')->first();
if ($langue) {
    echo "Langue: " . $langue->nom . " (" . $langue->code . ")\n";
    $langue->collaborateurs->each(function($collab) {
        echo "- " . $collab->nom . " " . $collab->prenom . " (niveau: " . $collab->pivot->niveau . ")\n";
    });
} else {
    echo "Aucune langue trouvée\n";
}

echo "\n6. Collaborateurs pour la première compétence technique :\n";
$competence = \App\Models\CompetenceTechnique::with('collaborateurs')->first();
if ($competence) {
    echo "Compétence: " . $competence->nom . " (catégorie: " . $competence->categorie . ")\n";
    $competence->collaborateurs->each(function($collab) {
        echo "- " . $collab->nom . " " . $collab->prenom . " (niveau: " . $collab->pivot->niveau . ")\n";
    });
} else {
    echo "Aucune compétence technique trouvée\n";
}

echo "\n-------------------------------------------\n";
echo "Vérification terminée\n";
