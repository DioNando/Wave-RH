<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    protected $fillable = [
        'libelle',
        'description',
        'couleur',
        'statut',
    ];

    public function documentAdministratifs()
    {
        return $this->hasMany(DocumentAdministratif::class);
    }
}
