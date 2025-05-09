<?php

namespace App\Models;

use App\Enums\CollaborateurGenre;
use App\Enums\CollaborateurStatutMarital;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    /**
     * Les relations à charger automatiquement.
     *
     * @var array
     */
    protected $with = ['langues', 'competencesTechniques'];

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

    public function document_administratifs()
    {
        return $this->hasMany(DocumentAdministratif::class);
    }

    public function contact_urgences()
    {
        return $this->hasMany(ContactUrgence::class);
    }

    public function contrat_travails()
    {
        return $this->hasMany(ContratTravail::class);
    }

    public function information_bancaires()
    {
        return $this->hasMany(InformationBancaire::class);
    }

    public function diplomes()
    {
        return $this->hasMany(Diplome::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function historique_postes()
    {
        return $this->hasMany(HistoriquePoste::class);
    }

    public function historique_augmentations()
    {
        return $this->hasMany(HistoriqueAugmentation::class);
    }

    public function historique_conges()
    {
        return $this->hasMany(HistoriqueConge::class);
    }

    public function historique_formations()
    {
        return $this->hasMany(HistoriqueFormation::class);
    }

    public function historique_primes()
    {
        return $this->hasMany(HistoriquePrime::class);
    }

    /**
     * Les langues maîtrisées par le collaborateur
     */
    public function langues()
    {
        return $this->belongsToMany(Langue::class, 'collaborateur_langues', 'collaborateur_id', 'langue_id', 'id', 'id', 'collab_lang_collab_id_foreign')
            ->withPivot('niveau')
            ->withTimestamps();
    }

    /**
     * Les compétences techniques du collaborateur
     */
    public function competencesTechniques()
    {
        return $this->belongsToMany(CompetenceTechnique::class, 'collaborateur_competence_techniques', 'collaborateur_id', 'competence_technique_id', 'id', 'id', 'collab_comp_tech_collab_id_foreign')
            ->withPivot('niveau', 'notes')
            ->withTimestamps();
    }

    protected $casts = [
        'genre' => CollaborateurGenre::class,
        'statut_marital' => CollaborateurStatutMarital::class,
    ];
}
