<?php

namespace App\Livewire\Collaborateurs\ContratsTravails;

use App\Models\Collaborateur;
use App\Models\ContratTravail;
use App\Enums\TypeContratTravail;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class Service extends Form
{
    use WithFileUploads;

    public ?Collaborateur $collaborateur;

    #[Validate]
    public $type_contrat = '';

    #[Validate]
    public $date_debut = '';

    #[Validate]
    public $date_fin = '';

    #[Validate]
    public $salaire = '';

    #[Validate]
    public $document_path;

    protected function rules()
    {
        return [
            'type_contrat' => [
                'required',
                Rule::in(array_column(TypeContratTravail::cases(), 'value'))
            ],
            'date_debut' => [
                'required',
                'date'
            ],
            'date_fin' => [
                'nullable',
                'date',
                'after:date_debut'
            ],
            'salaire' => [
                'nullable',
                'numeric',
                'min:0',
                'max:9999999.99'
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

    public function setContratTravail(ContratTravail $contratTravail)
    {
        $this->type_contrat = $contratTravail->type_contrat;
        $this->date_debut = $contratTravail->date_debut;
        $this->date_fin = $contratTravail->date_fin;
        $this->salaire = $contratTravail->salaire;
        $this->document_path = $contratTravail->document_path;
    }

    public function store()
    {
        $this->validate();

        $documentPath = $this->document_path ?
            $this->document_path->storePubliclyAs('contrats-travails', 'contrat_travail_' . strtolower($this->type_contrat) . '_' . strtolower($this->collaborateur->nom) . '_' . $this->document_path->hashName(), 'public') :
            null;

        $data = $this->all();
        $data['document_path'] = $documentPath;
        $data['collaborateur_id'] = $this->collaborateur->id;

        ContratTravail::create($data);
    }
}
