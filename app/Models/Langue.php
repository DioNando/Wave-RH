<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Langue extends Model
{
    protected $fillable = [
        'nom',
        'code',
    ];

    /**
     * Les collaborateurs qui maîtrisent cette langue
     */
    public function collaborateurs(): BelongsToMany
    {
        return $this->belongsToMany(Collaborateur::class, 'collaborateur_langues', 'langue_id', 'collaborateur_id', 'id', 'id', 'collab_lang_langue_id_foreign')
            ->withPivot('niveau')
            ->withTimestamps();
    }
}
