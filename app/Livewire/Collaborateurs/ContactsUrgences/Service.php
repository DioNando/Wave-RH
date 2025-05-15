<?php

namespace App\Livewire\Collaborateurs\ContactsUrgences;

use App\Models\Collaborateur;
use App\Models\ContactUrgence;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Collaborateur $collaborateur;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $relation = '';

    #[Validate]
    public $telephone = '';

    #[Validate]
    public $email = '';

    #[Validate]
    public $adresse_complete = '';

    #[Validate]
    public $ville_id = '';

    protected function rules()
    {
        return [
            'nom' => [
                'required',
                'string',
                'max:255'
            ],
            'relation' => [
                'nullable',
                'string',
                'max:255'
            ],
            'telephone' => [
                'required',
                'string',
                'max:20'
            ],
            'email' => [
                'nullable',
                'email',
                'max:255'
            ],
            'adresse_complete' => [
                'nullable',
                'string'
            ],
            'ville_id' => [
                'required',
                'exists:villes,id'
            ]
        ];
    }

    public function setCollaborateur(Collaborateur $collaborateur)
    {
        $this->collaborateur = $collaborateur;
    }

    public function setContactUrgence(ContactUrgence $contactUrgence)
    {
        $this->nom = $contactUrgence->nom;
        $this->relation = $contactUrgence->relation;
        $this->telephone = $contactUrgence->telephone;
        $this->email = $contactUrgence->email;
        $this->adresse_complete = $contactUrgence->adresse_complete;
        $this->ville_id = $contactUrgence->ville_id;
    }

    public function store()
    {
        $this->validate();

        $data = $this->all();
        $data['collaborateur_id'] = $this->collaborateur->id;

        ContactUrgence::create($data);
    }

    public function update(ContactUrgence $contactUrgence)
    {
        $this->validate();

        $data = $this->all();
        $data['collaborateur_id'] = $this->collaborateur->id;

        $contactUrgence->update($data);
    }
}
