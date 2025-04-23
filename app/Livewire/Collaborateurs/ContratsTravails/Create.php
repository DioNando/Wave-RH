<?php

namespace App\Livewire\Collaborateurs\ContratsTravails;

use App\Models\Collaborateur;
use App\Models\ContratTravail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Service $form;

    public function mount(Collaborateur $collaborateur, ContratTravail $contratTravail)
    {
        $this->form->setCollaborateur($collaborateur);
        $this->form->setContratTravail($contratTravail);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('collaborateurs.show', $this->form->collaborateur->id)->with('success', 'Contrat de travail ajouté avec succès');
    }

    public function render()
    {
        return view('livewire.collaborateurs.contrats-travails.create');
    }
}
