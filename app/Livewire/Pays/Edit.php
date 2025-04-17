<?php

namespace App\Livewire\Pays;

use App\Models\Pays;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(Pays $pays)
    {
        $this->form->setPays($pays);
    }

    public function update()
    {
        $this->form->update();
        return redirect()->route('pays.index')->with('success', $this->form->nom . ' mis à jour avec succès');
    }

    public function render()
    {
        return view('livewire.pays.edit');
    }
}
