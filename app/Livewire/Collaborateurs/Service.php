<?php

namespace App\Livewire\Collaborateurs;

use App\Enums\CollaborateurGenre;
use App\Enums\CollaborateurStatutMarital;
use App\Models\Collaborateur;
use App\Models\Pays;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Service extends Form
{
    public ?Collaborateur $collaborateur;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $prenom = '';

    #[Validate]
    public $photo_profil;

    #[Validate]
    public $genre = '';

    #[Validate]
    public $date_naissance = '';

    #[Validate]
    public $lieu_naissance_id = '';

    #[Validate]
    public $pays_id = '';

    #[Validate]
    public $statut_marital = '';

    #[Validate]
    public $nombre_enfants = 0;

    #[Validate]
    public $cin = '';

    #[Validate]
    public $cnss = '';

    #[Validate]
    public $email_professionnel = '';

    #[Validate]
    public $email_personnel = '';

    #[Validate]
    public $telephone_professionnel = '';

    #[Validate]
    public $telephone_personnel = '';

    #[Validate]
    public $adresse_complete = '';

    #[Validate]
    public $ville_id = '';

    #[Validate]
    public $date_embauche = '';

    #[Validate]
    public $matricule_interne = '';

    #[Validate]
    public $solde_conge = '';

    #[Validate]
    public $document_cv;
    // public $document_cv = []; // TODO: Dans le cas ou multiple files

    #[Validate]
    public $langues = [];

    #[Validate]
    public $competences_techniques = [];

    #[Validate]
    public $situation_medicale = '';

    #[Validate]
    public $notes_diverses = '';

    public $user_id;

    protected function rules()
    {
        return [
            'nom' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'prenom' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'photo_profil' => [
                Rule::when(!is_string($this->photo_profil), [
                    'nullable',
                    'image',
                    'mimes:png,jpg,jpeg',
                    'max:5120',
                    'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
                ]),
            ],
            'genre' => [
                'required',
                // Rule::in(array_column(\App\Enums\CollaborateurGenre::cases(), 'value')),
            ],
            'date_naissance' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
                'after:1900-01-01'
            ],
            'lieu_naissance_id' => [
                'required',
                'exists:villes,id'
            ],
            'pays_id' => [
                'required',
                'exists:pays,id'
            ],
            'statut_marital' => [
                'nullable',
                // Rule::in(\App\Enums\CollaborateurStatutMarital::cases()),
            ],
            'nombre_enfants' => [
                'nullable',
                'integer',
                'min:0'
            ],
            'cin' => [
                'required',
                'string',
                'max:50',
                'regex:/^[A-Za-z0-9]+$/',
                Rule::unique('collaborateurs', 'cin')->ignore($this->collaborateur),
            ],
            'cnss' => [
                'required',
                'string',
                'max:50',
                'regex:/^[0-9]+$/',
                Rule::unique('collaborateurs', 'cnss')->ignore($this->collaborateur),
            ],
            'email_professionnel' => [
                'required',
                'email',
                'max:255',
                Rule::unique('collaborateurs', 'email_professionnel')->ignore($this->collaborateur),
            ],
            'email_personnel' => [
                'nullable',
                'email',
                'max:255'
            ],
            'telephone_professionnel' => [
                'required',
                'string',
                'max:20',
                'regex:/^[0-9]+$/'
            ],
            'telephone_personnel' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^[0-9]+$/'
            ],
            'adresse_complete' => [
                'nullable',
                'string'
            ],
            'ville_id' => [
                'required',
                'exists:villes,id'
            ],
            'date_embauche' => [
                'required',
                'date',
                'before_or_equal:today'
            ],
            'matricule_interne' => [
                'required',
                'string',
                'max:50',
                Rule::unique('collaborateurs', 'matricule_interne')->ignore($this->collaborateur)
            ],
            'solde_conge' => [
                'nullable',
                'integer',
                'min:0'
            ],
            // 'document_cv.*' => [ // TODO: variantes dans le cas ou multpile files
            'document_cv' => [
                'nullable',
                Rule::when(!is_string($this->document_cv), [
                    'file',
                    'mimes:pdf,doc,docx',
                    'max:5120'
                ]),
            ],
            'langues' => [
                'nullable',
                'array'
            ],
            'langues.*' => [
                'nullable',
                'string'
            ],
            'competences_techniques' => [
                'nullable',
                'array'
            ],
            'competences_techniques.*' => [
                'nullable',
                'string'
            ],
            'situation_medicale' => [
                'nullable',
                'string'
            ],
            'notes_diverses' => [
                'nullable',
                'string'
            ]
        ];
    }

    public function setCollaborateur(Collaborateur $collaborateur)
    {
        $this->collaborateur = $collaborateur;

        $this->nom = $collaborateur->nom;
        $this->prenom = $collaborateur->prenom;
        $this->genre = $collaborateur->genre ?? CollaborateurGenre::HOMME->value;
        $this->photo_profil = $collaborateur->photo_profil;
        $this->date_naissance = $collaborateur->date_naissance;
        $this->lieu_naissance_id = $collaborateur->lieu_naissance_id;
        $this->pays_id = $collaborateur->pays_id ?? Pays::orderBy('nom', 'asc')->first()->id ?? '';
        $this->statut_marital = $collaborateur->statut_marital ?? CollaborateurStatutMarital::CELIBATAIRE->value;
        $this->nombre_enfants = $collaborateur->nombre_enfants ?? 0;
        $this->cin = $collaborateur->cin;
        $this->cnss = $collaborateur->cnss;
        $this->email_professionnel = $collaborateur->email_professionnel;
        $this->email_personnel = $collaborateur->email_personnel;
        $this->telephone_professionnel = $collaborateur->telephone_professionnel;
        $this->telephone_personnel = $collaborateur->telephone_personnel;
        $this->adresse_complete = $collaborateur->adresse_complete;
        $this->ville_id = $collaborateur->ville_id ?? Ville::orderBy('nom', 'asc')->first()->id ?? '';
        $this->date_embauche = $collaborateur->date_embauche;
        $this->matricule_interne = $collaborateur->matricule_interne;
        $this->solde_conge = $collaborateur->solde_conge ?? 0;
        // $this->document_cv = $collaborateur->document_cv;

        // Charger les langues et compétences techniques à partir des relations
        $this->langues = $collaborateur->id ? $collaborateur->langues->pluck('nom')->toArray() : [];
        $this->competences_techniques = $collaborateur->id ? $collaborateur->competencesTechniques->pluck('nom')->toArray() : [];

        $this->situation_medicale = $collaborateur->situation_medicale;
        $this->notes_diverses = $collaborateur->notes_diverses;
    }

    public function store()
    {
        $this->validate();
        $this->user_id = Auth::user()->id;

        // Préparer les données
        $data = $this->all();

        // Gérer la photo de profil
        if ($this->photo_profil && !is_string($this->photo_profil)) {
            $photoPath = $this->photo_profil->storePubliclyAs('photos', $this->photo_profil->hashName(), 'public');
            $data['photo_profil'] = $photoPath;
        }

        // Gérer le CV
        // if ($this->document_cv && !is_string($this->document_cv)) {
        //     $cvPath = $this->document_cv->storePubliclyAs('cv', 'cv_' . strtolower($this->nom) . '_' . $this->document_cv->hashName(), 'public');
        //     $data['document_cv'] = $cvPath;
        // }

        // Stocker les langues et compétences séparément dans les relations
        $langues = $this->langues;
        $competences = $this->competences_techniques;

        // Supprimer les champs qui ne sont plus dans le modèle
        unset($data['langues']);
        unset($data['competences_techniques']);

        // Créer l'enregistrement avec les données modifiées
        $collaborateur = Collaborateur::create($data);

        // Associer les langues
        if (!empty($langues)) {
            foreach ($langues as $langueNom) {
                if (!empty($langueNom)) {
                    $langue = \App\Models\Langue::where('nom', 'like', "%$langueNom%")->first();
                    if ($langue) {
                        $collaborateur->langues()->attach($langue->id, [
                            'niveau' => \App\Enums\LangueNiveau::INTERMEDIAIRE->value
                        ]);
                    }
                }
            }
        }

        // Associer les compétences techniques
        if (!empty($competences)) {
            foreach ($competences as $competenceNom) {
                if (!empty($competenceNom)) {
                    $competence = \App\Models\CompetenceTechnique::where('nom', 'like', "%$competenceNom%")->first();
                    if ($competence) {
                        $collaborateur->competencesTechniques()->attach($competence->id, [
                            'niveau' => 3,
                            'notes' => null
                        ]);
                    }
                }
            }
        }
    }

    public function update()
    {
        $this->validate();
        $this->user_id = Auth::user()->id;

        // Préparer les données
        $data = $this->all();

        // Gérer la photo de profil
        if ($this->photo_profil) {
            if (!is_string($this->photo_profil)) {
                $photoPath = $this->photo_profil->storePubliclyAs('photos', $this->photo_profil->hashName(), 'public');
                $data['photo_profil'] = $photoPath;
            }
        }

        // Stocker les langues et compétences séparément dans les relations
        $langues = $this->langues;
        $competences = $this->competences_techniques;

        // Supprimer les champs qui ne sont plus dans le modèle
        unset($data['langues']);
        unset($data['competences_techniques']);

        // Mettre à jour l'enregistrement avec les données modifiées
        $this->collaborateur->update($data);

        // Détacher toutes les relations existantes
        $this->collaborateur->langues()->detach();
        $this->collaborateur->competencesTechniques()->detach();

        // Associer les nouvelles langues
        if (!empty($langues)) {
            foreach ($langues as $langueNom) {
                if (!empty($langueNom)) {
                    $langue = \App\Models\Langue::where('nom', 'like', "%$langueNom%")->first();
                    if ($langue) {
                        $this->collaborateur->langues()->attach($langue->id, [
                            'niveau' => \App\Enums\LangueNiveau::INTERMEDIAIRE->value
                        ]);
                    }
                }
            }
        }

        // Associer les nouvelles compétences techniques
        if (!empty($competences)) {
            foreach ($competences as $competenceNom) {
                if (!empty($competenceNom)) {
                    $competence = \App\Models\CompetenceTechnique::where('nom', 'like', "%$competenceNom%")->first();
                    if ($competence) {
                        $this->collaborateur->competencesTechniques()->attach($competence->id, [
                            'niveau' => 3,
                            'notes' => null
                        ]);
                    }
                }
            }
        }
    }
}
