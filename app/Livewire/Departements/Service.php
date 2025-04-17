<?php

namespace App\Livewire\Departements;

use App\Models\Departement;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Departement $departement;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $description = '';

    protected function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }

    public function setDepartement(Departement $departement)
    {
        $this->departement = $departement;
        $this->nom = $departement->nom;
        $this->description = $departement->description;
    }

    public function store()
    {
        $this->validate();
        Departement::create($this->only(['nom', 'description']));
    }

    public function update()
    {
        $this->validate();
        $this->departement->update($this->only(['nom', 'description']));
    }
}
