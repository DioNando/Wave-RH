<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentAdministratif extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'type_document_id',
        'date_emission',
        'date_expiration',
        'document_path',
        'statut'
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }
    
    public function typeDocument()
    {
        return $this->belongsTo(TypeDocument::class);
    }
}
