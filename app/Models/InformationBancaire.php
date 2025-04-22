<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationBancaire extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'nom_banque',
        'iban',
        'code_swift',
        'titulaire_compte',
        'statut',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }
}
