<?php

namespace App\Livewire\Collaborateurs\ContactsUrgences;

use App\Models\Collaborateur;
use App\Models\ContactUrgence;
use App\Models\Ville;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(Collaborateur $collaborateur, ContactUrgence $contactUrgence)
    {
        $this->form->setCollaborateur($collaborateur);
        $this->form->setContactUrgence($contactUrgence);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('collaborateurs.show', ['collaborateur' => $this->form->collaborateur->id, 'tab' => 'profil-personnel'])->with('success', 'Contact d\'urgence ajouté avec succès');
    }

    public function render()
    {
        $villes = Ville::orderBy('nom')->get();
        return view('livewire.collaborateurs.contacts-urgences.create', compact('villes'));
    }
}
