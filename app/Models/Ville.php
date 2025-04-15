<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = [
        'nom',
        'pays_id',
        'region_id',
        'statut',
    ];

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
