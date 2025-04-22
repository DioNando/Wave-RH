<?php

namespace App\Models;

use App\Enums\TypeFormation;
use Illuminate\Database\Eloquent\Model;

class HistoriqueFormation extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'titre',
        'organisme',
        'type_formation',
        'date_debut',
        'date_fin',
        'resultat',
        'document_path',
        'commentaires',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }

    protected $casts = [
        'type_formation' => TypeFormation::class,
    ];
}
