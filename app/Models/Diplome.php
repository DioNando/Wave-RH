<?php

namespace App\Models;

use App\Enums\DiplomeNiveau;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'titre',
        'etablissement',
        'pays_id',
        'date_obtention',
        'niveau',
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

    protected $casts = [
        'niveau' => DiplomeNiveau::class,
    ];
}
