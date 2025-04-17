<?php

namespace App\Livewire\Pays;

use App\Models\Pays;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(Pays $pays)
    {
        $this->form->setPays($pays);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('pays.index')->with('success', $this->form->nom . ' ajouté avec succès');
    }

    public function render()
    {
        return view('livewire.pays.create');
    }
}
