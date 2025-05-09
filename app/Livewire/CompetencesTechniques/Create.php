<?php

namespace App\Livewire\CompetencesTechniques;

use App\Models\CompetenceTechnique;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(CompetenceTechnique $competenceTechnique)
    {
        $this->form->setCompetenceTechnique($competenceTechnique);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('competences-techniques.index')->with('success', $this->form->nom . ' ajouté avec succès');
    }

    public function render()
    {
        // Récupérer les catégories distinctes pour l'autocomplete
        $categories = CompetenceTechnique::select('categorie')
                                        ->distinct()
                                        ->orderBy('categorie')
                                        ->pluck('categorie');

        return view('livewire.competences-techniques.create', compact('categories'));
    }
}
