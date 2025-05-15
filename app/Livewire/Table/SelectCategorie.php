<?php

namespace App\Livewire\Table;

use App\Models\CompetenceTechnique;
use Livewire\Component;

class SelectCategorie extends Component
{
    public $categorie;

    public function mount($categorie = null)
    {
        $this->categorie = $categorie;
    }

    public function updatedCategorie()
    {
        $this->dispatch('categorieUpdated', $this->categorie);
    }

    public function render()
    {
        $categories = CompetenceTechnique::select('categorie')
            ->distinct()
            ->orderBy('categorie')
            ->pluck('categorie');
        return view('livewire.table.select-categorie', compact('categories'));
    }
}
