<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUrgence extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'nom',
        'relation',
        'telephone',
        'email',
        'adresse_complete',
        'ville_id',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
