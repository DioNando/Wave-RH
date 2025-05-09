<?php

namespace App\Livewire\CompetencesTechniques;

use App\Models\CompetenceTechnique;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(CompetenceTechnique $competenceTechnique)
    {
        $this->form->setCompetenceTechnique($competenceTechnique);
    }

    public function update()
    {
        $this->form->update();
        return redirect()->route('competences-techniques.index')->with('success', $this->form->nom . ' mis à jour avec succès');
    }

    public function render()
    {
        // Récupérer les catégories distinctes pour l'autocomplete
        $categories = CompetenceTechnique::select('categorie')
                                        ->distinct()
                                        ->orderBy('categorie')
                                        ->pluck('categorie');

        return view('livewire.competences-techniques.edit', compact('categories'));
    }
}
