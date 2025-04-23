<?php

namespace App\Livewire\Collaborateurs\InformationsBancaires;

use App\Models\Collaborateur;
use Livewire\Component;

class Update extends Component
{
    public Service $form;

    public function mount(Collaborateur $collaborateur)
    {
        $this->form->setCollaborateur($collaborateur);
    }

    public function update()
    {
        $this->form->update();
        return redirect()->route('collaborateurs.show', $this->form->collaborateur->id)->with('success', 'Information bancaire mise à jour avec succès');
    }

    public function render()
    {
        return view('livewire.collaborateurs.informations-bancaires.update');
    }
}
