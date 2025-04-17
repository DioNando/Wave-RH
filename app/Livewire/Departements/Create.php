<?php

namespace App\Livewire\Departements;

use App\Models\Departement;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(Departement $departement)
    {
        $this->form->setDepartement($departement);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('departements.index')->with('success', $this->form->nom . ' ajouté avec succès');
    }

    public function render()
    {
        return view('livewire.departements.create');
    }
}
