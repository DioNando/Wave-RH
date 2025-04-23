<?php

namespace App\Livewire\Collaborateurs\Certifications;

use App\Models\Collaborateur;
use App\Models\Certification;
use App\Models\Pays;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public Service $form;

    public function mount(Collaborateur $collaborateur, Certification $certification)
    {
        $this->form->setCollaborateur($collaborateur);
        $this->form->setCertification($certification);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('collaborateurs.show', ['collaborateur' => $this->form->collaborateur->id, 'tab' => 'documents'])->with('success', 'Certification ajoutée avec succès');
    }

    public function render()
    {
        $pays = Pays::orderBy('nom')->get();
        return view('livewire.collaborateurs.certifications.create', compact('pays'));
    }
}
