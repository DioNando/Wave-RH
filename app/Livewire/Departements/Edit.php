<?php

namespace App\Livewire\Departements;

use App\Models\Departement;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(Departement $departement)
    {
        $this->form->setDepartement($departement);
    }

    public function update()
    {
        $this->form->update();
        return redirect()->route('departements.index')->with('success', $this->form->nom . ' mis à jour avec succès');
    }

    public function render()
    {
        return view('livewire.departements.edit');
    }
}
