<?php

namespace App\Livewire\Collaborateurs\Certifications;

use App\Models\Collaborateur;
use App\Models\Certification;
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
    public $organisme = '';

    #[Validate]
    public $pays_id = '';

    #[Validate]
    public $date_obtention = '';

    #[Validate]
    public $date_expiration = '';

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
            'organisme' => [
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
            'date_expiration' => [
                'nullable',
                'date',
                'after:date_obtention'
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

    public function setCertification(Certification $certification)
    {
        $this->titre = $certification->titre;
        $this->organisme = $certification->organisme;
        // $this->pays_id = $certification->pays_id ?? Pays::orderBy('nom', 'asc')->first()->id ?? '';
        $this->pays_id = $certification->pays_id;
        $this->date_obtention = $certification->date_obtention;
        $this->date_expiration = $certification->date_expiration;
        $this->document_path = $certification->document_path;
    }

    public function store()
    {
        $this->validate();

        $documentPath = $this->document_path ?
            $this->document_path->storePubliclyAs('certifications', 'certification_' . strtolower($this->titre) . '_' . strtolower($this->collaborateur->nom) . '_' . $this->document_path->hashName(), 'public') :
            null;

        $data = $this->all();
        $data['document_path'] = $documentPath;
        $data['collaborateur_id'] = $this->collaborateur->id;

        Certification::create($data);
    }
}
