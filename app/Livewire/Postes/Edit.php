<?php

namespace App\Livewire\Postes;

use App\Models\Departement;
use App\Models\Poste;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(Poste $poste)
    {
        $this->form->setPoste($poste);
    }
    public function update()
    {
        $this->form->update();
        return redirect()->route('postes.index')->with('success', $this->form->nom . ' mis à jour avec succès');
    }

    public function render()
    {
        $departements = Departement::orderBy('nom', 'asc')->get();
        return view('livewire.postes.edit', compact('departements'));
    }
}
