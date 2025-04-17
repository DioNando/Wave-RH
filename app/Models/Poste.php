<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'departement_id',
        'statut',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    // public function historiques_postes()
    // {
    //     return $this->hasMany(HistoriquePoste::class);
    // }
}
