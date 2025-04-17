<?php

namespace App\Livewire\Postes;

use App\Models\Departement;
use App\Models\Poste;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Poste $poste;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $description = '';

    #[Validate]
    public $departement_id = '';

    protected function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ];
    }

    public function setPoste(Poste $poste)
    {
        $this->poste = $poste;
        $this->nom = $poste->nom;
        $this->description = $poste->description;
        $this->departement_id = $poste->departement_id ?? Departement::orderBy('nom', 'asc')->first()->id ?? '';
    }

    public function store()
    {
        $this->validate();
        Poste::create($this->only(['nom', 'description', 'departement_id']));
    }

    public function update()
    {
        $this->validate();
        $this->poste->update($this->only(['nom', 'description', 'departement_id']));
    }
}
