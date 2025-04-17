<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'statut',
    ];

    public function postes()
    {
        return $this->hasMany(Poste::class);
    }
}
