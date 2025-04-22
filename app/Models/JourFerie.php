<?php

namespace App\Models;

use App\Enums\TypeJourFerie;
use Illuminate\Database\Eloquent\Model;

class JourFerie extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'date',
        'type',
        'est_recurrent',
        'est_confirme',
        'statut',
    ];

    protected $casts = [
        'type' => TypeJourFerie::class,
    ];
}
