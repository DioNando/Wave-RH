<?php

namespace App\Livewire\Collaborateurs\ContactsUrgences;

use App\Models\Collaborateur;
use App\Models\ContactUrgence;
use App\Models\Ville;
use Livewire\Component;

class Update extends Component
{
    public $show = false;
    public $contactUrgenceId;
    public Service $form;
    public ContactUrgence $contactUrgence;

    public function mount(Collaborateur $collaborateur, ContactUrgence $contactUrgence)
    {
        $this->contactUrgence = $contactUrgence;
        $this->contactUrgenceId = $contactUrgence->id;

        $this->form->setCollaborateur($collaborateur);
        $this->form->setContactUrgence($contactUrgence);
    }

    public function update()
    {
        $this->form->update($this->contactUrgence);
        $this->dispatch('contact-updated');
        return redirect()->route('collaborateurs.show', ['collaborateur' => $this->form->collaborateur->id, 'tab' => 'profil-personnel'])->with('success', 'Contact d\'urgence modifié avec succès');
    }

    public function render()
    {
        $villes = Ville::orderBy('nom')->get();
        return view('livewire.collaborateurs.contacts-urgences.update', compact('villes'));
    }
}
