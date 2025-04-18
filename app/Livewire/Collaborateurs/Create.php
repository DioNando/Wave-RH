<?php

namespace App\Livewire\Collaborateurs;

use App\Models\Collaborateur;
use App\Models\Pays;
use App\Models\Ville;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Service $form;

    public function mount(Collaborateur $collaborateur)
    {
        $this->form->setCollaborateur($collaborateur);
        $this->updateVilles();

        // Initialiser avec des tableaux vides si nécessaire
        if (empty($this->form->langues)) {
            $this->form->langues = [];
        }

        if (empty($this->form->competences_techniques)) {
            $this->form->competences_techniques = [];
        }
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('collaborateurs.index')->with('success', $this->form->nom . ' ' . $this->form->prenom . ' ajouté avec succès');
    }

    public function getVillesProperty()
    {
        return $this->form->pays_id
            ? Ville::where('pays_id', $this->form->pays_id)->orderBy('nom', 'asc')->get()
            : collect();
    }

    public function updatedFormPaysId()
    {
        $this->updateVilles();
    }

    private function updateVilles()
    {
        $this->form->lieu_naissance_id = Ville::where('pays_id', $this->form->pays_id)->orderBy('nom', 'asc')->first()->id ?? '';
    }

    public function addLangue()
    {
        $this->form->langues[] = '';
    }

    public function removeLangue($index)
    {
        unset($this->form->langues[$index]);
        $this->form->langues = array_values($this->form->langues);
    }

    public function addCompetence()
    {
        $this->form->competences_techniques[] = '';
    }

    public function removeCompetence($index)
    {
        unset($this->form->competences_techniques[$index]);
        $this->form->competences_techniques = array_values($this->form->competences_techniques);
    }

    public function render()
    {
        $pays = Pays::orderBy('nom', 'asc')->get();
        $villes_all = Ville::orderBy('nom', 'asc')->get();
        $villes = $this->villes;
        return view('livewire.collaborateurs.create', compact('pays', 'villes', 'villes_all'));
    }
}
