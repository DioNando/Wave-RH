<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'nom',
        'pays_id',
        'statut',
    ];

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

    public function villes()
    {
        return $this->hasMany(Ville::class);
    }
}
