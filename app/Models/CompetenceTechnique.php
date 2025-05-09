<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CompetenceTechnique extends Model
{
    protected $fillable = [
        'nom',
        'categorie',
        'description',
    ];

    /**
     * Les collaborateurs qui possèdent cette compétence technique
     */
    public function collaborateurs(): BelongsToMany
    {
        return $this->belongsToMany(Collaborateur::class, 'collaborateur_competence_techniques', 'competence_technique_id', 'collaborateur_id', 'id', 'id', 'collab_comp_tech_comp_id_foreign')
            ->withPivot('niveau', 'notes')
            ->withTimestamps();
    }
}
