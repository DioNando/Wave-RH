<?php

namespace App\Models;

use App\Enums\Monnaie;
use Illuminate\Database\Eloquent\Model;

class HistoriqueAugmentation extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'ancien_salaire',
        'nouveau_salaire',
        'monnaie',
        'pourcentage',
        'motif',
        'commentaires',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }

    protected $casts = [
        'monnaie' => Monnaie::class,
    ];
}
