<?php

namespace App\Livewire\Langues;

use App\Models\Langue;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(Langue $langue)
    {
        $this->form->setLangue($langue);
    }

    public function update()
    {
        $this->form->update();
        return redirect()->route('langues.index')->with('success', $this->form->nom . ' mis à jour avec succès');
    }

    public function render()
    {
        return view('livewire.langues.edit');
    }
}
