<?php

namespace App\Models;

use App\Enums\TypeConge;
use Illuminate\Database\Eloquent\Model;

class HistoriqueConge extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'type_conge',
        'date_debut',
        'date_fin',
        'duree',
        'motif',
        'commentaires',
        'document_path',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }

    protected $casts = [
        'type_conge' => TypeConge::class,
    ];
}
