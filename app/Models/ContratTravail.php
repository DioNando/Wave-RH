<?php

namespace App\Models;

use App\Enums\TypeContratTravail;
use Illuminate\Database\Eloquent\Model;

class ContratTravail extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'type_contrat',
        'date_debut',
        'date_fin',
        'salaire',
        'document_path',
        'statut',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type_contrat' => TypeContratTravail::class,
        ];
    }

    public function collaborateur() {
        return $this->belongsTo(Collaborateur::class);
    }
}
