<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'titre',
        'organisme',
        'pays_id',
        'date_obtention',
        'date_expiration',
        'document_path',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }
}
