<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriquePoste extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'poste_id',
        'date_debut',
        'date_fin',
        'commentaires',
        'raison_fin',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
}
