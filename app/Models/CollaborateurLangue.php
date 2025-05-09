<?php

namespace App\Models;

use App\Enums\LangueNiveau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaborateurLangue extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'langue_id',
        'niveau',
    ];

    /**
     * Le collaborateur associé à cette langue
     */
    public function collaborateur(): BelongsTo
    {
        return $this->belongsTo(Collaborateur::class, 'collaborateur_id', 'id', 'collab_lang_collab_id_foreign');
    }

    /**
     * La langue associée
     */
    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'langue_id', 'id', 'collab_lang_langue_id_foreign');
    }

    /**
     * Les attributs à caster.
     */
    protected $casts = [
        'niveau' => LangueNiveau::class,
    ];
}
