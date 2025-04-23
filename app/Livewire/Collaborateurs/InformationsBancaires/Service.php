<?php

namespace App\Livewire\Collaborateurs\InformationsBancaires;

use App\Models\Collaborateur;
use App\Models\InformationBancaire;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Collaborateur $collaborateur;

    #[Validate]
    public $nom_banque = '';

    #[Validate]
    public $iban = '';

    #[Validate]
    public $code_swift = '';

    #[Validate]
    public $titulaire_compte = '';

    protected function rules()
    {
        return [
            'nom_banque' => ['required', 'string', 'max:255'],
            'iban' => ['required', 'string', 'max:255'],
            'code_swift' => ['string', 'max:255'],
            'titulaire_compte' => ['required', 'string', 'max:255'],
        ];
    }

    public function setCollaborateur(Collaborateur $collaborateur)
    {
        $this->collaborateur = $collaborateur;
    }

    public function setInformationBancaire(InformationBancaire $informationBancaire)
    {
        $this->nom_banque = $informationBancaire->nom_banque;
        $this->iban = $informationBancaire->iban;
        $this->code_swift = $informationBancaire->code_swift;
        $this->titulaire_compte = $informationBancaire->titulaire_compte;
    }

    public function store()
    {
        $this->validate();
        $this->collaborateur->information_bancaires()->create([
            'nom_banque' => $this->nom_banque,
            'iban' => $this->iban,
            'code_swift' => $this->code_swift,
            'titulaire_compte' => $this->titulaire_compte,
        ]);
    }

    public function update()
    {
        $this->validate();
        $this->collaborateur->information_bancaires()->update([
            'nom_banque' => $this->nom_banque,
            'iban' => $this->iban,
            'code_swift' => $this->code_swift,
            'titulaire_compte' => $this->titulaire_compte,
        ]);
    }
}
