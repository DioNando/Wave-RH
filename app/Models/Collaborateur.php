<?php

namespace App\Models;

use App\Enums\CollaborateurGenre;
use App\Enums\CollaborateurStatutMarital;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{

    protected $fillable = [
        // Informations gérérales
        'nom',
        'prenom',
        'photo_profil',
        'genre',
        'date_naissance',
        'lieu_naissance_id',
        'pays_id',
        'statut_marital',
        'nombre_enfants',
        'cin',
        'cnss',
        // Coordonnées
        'email_professionnel',
        'email_personnel',
        'telephone_professionnel',
        'telephone_personnel',
        'adresse_complete',
        'ville_id',
        // Informations professionnelles
        'date_embauche',
        'matricule_interne',
        'solde_conge',
        // Compétences et qualifications
        // 'document_cv',
        'langues',
        'competences_techniques',
        // Informations santé
        'situation_medicale',
        // Autre informations
        'notes_diverses',
        'statut',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function lieu_naissance()
    {
        return $this->belongsTo(Ville::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

    public function documentAdministratifs()
    {
        return $this->hasMany(DocumentAdministratif::class);
    }

    protected $casts = [
        'genre' => CollaborateurGenre::class,
        'statut_marital' => CollaborateurStatutMarital::class,
    ];
}
