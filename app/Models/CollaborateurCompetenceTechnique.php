<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaborateurCompetenceTechnique extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'competence_technique_id',
        'niveau',
        'notes',
    ];

    /**
     * Le collaborateur associé à cette compétence technique
     */
    public function collaborateur(): BelongsTo
    {
        return $this->belongsTo(Collaborateur::class, 'collaborateur_id', 'id', 'collab_comp_tech_collab_id_foreign');
    }

    /**
     * La compétence technique associée
     */
    public function competenceTechnique(): BelongsTo
    {
        return $this->belongsTo(CompetenceTechnique::class, 'competence_technique_id', 'id', 'collab_comp_tech_comp_id_foreign');
    }
}
