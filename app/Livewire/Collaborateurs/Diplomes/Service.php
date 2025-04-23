<?php

namespace App\Livewire\Collaborateurs\Diplomes;

use App\Enums\DiplomeNiveau;
use App\Models\Collaborateur;
use App\Models\Diplome;
use App\Models\Pays;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class Service extends Form
{
    public ?Collaborateur $collaborateur;

    #[Validate]
    public $titre = '';

    #[Validate]
    public $etablissement = '';

    #[Validate]
    public $pays_id = '';

    #[Validate]
    public $date_obtention = '';

    #[Validate]
    public $niveau = '';

    #[Validate]
    public $document_path;

    protected function rules()
    {
        return [
            'titre' => [
                'required',
                'string',
                'max:255'
            ],
            'etablissement' => [
                'nullable',
                'string',
                'max:255'
            ],
            'pays_id' => [
                'nullable',
                'exists:pays,id'
            ],
            'date_obtention' => [
                'nullable',
                'date',
                'before_or_equal:today'
            ],
            'niveau' => [
                'nullable',
                Rule::in(array_column(DiplomeNiveau::cases(), 'value'))
            ],
            'document_path' => [
                Rule::when(!is_string($this->document_path), [
                    'nullable',
                    'file',
                    'mimes:pdf,doc,docx',
                    'max:10240'
                ])
            ]
        ];
    }

    public function setCollaborateur(Collaborateur $collaborateur)
    {
        $this->collaborateur = $collaborateur;
    }

    public function setDiplome(Diplome $diplome)
    {
        $this->titre = $diplome->titre;
        $this->etablissement = $diplome->etablissement;
        // $this->pays_id = $diplome->pays_id ?? Pays::orderBy('nom', 'asc')->first()->id ?? '';
        $this->pays_id = $diplome->pays_id;
        $this->date_obtention = $diplome->date_obtention;
        $this->niveau = $diplome->niveau;
        $this->document_path = $diplome->document_path;
    }

    public function store()
    {
        $this->validate();

        $documentPath = $this->document_path ?
            $this->document_path->storePubliclyAs('diplomes', 'diplome_' . strtolower($this->titre) . '_' . strtolower($this->collaborateur->nom) . '_' . $this->document_path->hashName(), 'public') :
            null;

        $data = $this->all();
        $data['document_path'] = $documentPath;
        $data['collaborateur_id'] = $this->collaborateur->id;

        Diplome::create($data);
    }
}
