<?php

namespace App\Livewire\Collaborateurs\InformationsBancaires;

use App\Models\Collaborateur;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(Collaborateur $collaborateur)
    {
        $this->form->setCollaborateur($collaborateur);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('collaborateurs.show', ['collaborateur' => $this->form->collaborateur->id, 'tab' => 'finances'])->with('success', 'Information bancaire ajoutée avec succès');
    }

    public function render()
    {
        return view('livewire.collaborateurs.informations-bancaires.create');
    }
}
