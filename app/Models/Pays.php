<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = [
        'nom',
        'code_iso',
        'nationalite',
        'statut',
    ];

    public function villes()
    {
        return $this->hasMany(Ville::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    // public function collaborateurs()
    // {
    //     return $this->hasMany(Collaborateur::class);
    // }
}
