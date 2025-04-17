<?php

namespace App\Livewire\Postes;

use App\Models\Departement;
use App\Models\Poste;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(Poste $poste)
    {
        $this->form->setPoste($poste);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('postes.index')->with('success', $this->form->nom . ' ajouté avec succès');
    }

    public function render()
    {
        $departements = Departement::orderBy('nom', 'asc')->get();
        return view('livewire.postes.create', compact('departements'));
    }
}
