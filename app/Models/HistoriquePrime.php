<?php

namespace App\Models;

use App\Enums\TypePrime;
use Illuminate\Database\Eloquent\Model;

class HistoriquePrime extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'date_prime',
        'montant',
        'monnaie',
        'type_prime',
        'motif',
        'document_path',
        'commentaires',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }

    protected $casts = [
        'type_prime' => TypePrime::class,
    ];
}
