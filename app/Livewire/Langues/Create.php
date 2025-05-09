<?php

namespace App\Livewire\Langues;

use App\Models\Langue;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(Langue $langue)
    {
        $this->form->setLangue($langue);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('langues.index')->with('success', $this->form->nom . ' ajouté avec succès');
    }

    public function render()
    {
        return view('livewire.langues.create');
    }
}
