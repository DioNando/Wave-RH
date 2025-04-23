<?php

namespace App\Livewire\Collaborateurs\Diplomes;

use App\Models\Collaborateur;
use App\Models\Diplome;
use App\Models\Pays;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public Service $form;

    public function mount(Collaborateur $collaborateur, Diplome $diplome)
    {
        $this->form->setCollaborateur($collaborateur);
        $this->form->setDiplome($diplome);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('collaborateurs.show', $this->form->collaborateur->id)->with('success', 'Diplôme ajouté avec succès');
    }

    public function render()
    {
        $pays = Pays::orderBy('nom')->get();
        return view('livewire.collaborateurs.diplomes.create', compact('pays'));
    }
}
