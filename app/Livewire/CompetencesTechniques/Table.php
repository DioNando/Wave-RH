<?php

namespace App\Livewire\CompetencesTechniques;

use App\Models\CompetenceTechnique;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $categorieFilter = '';

    protected $updatesQueryString = ['search', 'categorieFilter'];

    protected $listeners = [
        'searchUpdated' => 'updateSearch',
        'categorieUpdated' => 'updateCategorie'
    ];

    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function updateCategorie($categorie)
    {
        $this->categorieFilter = $categorie;
        $this->resetPage();
    }

    public function updatedCategorieFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = CompetenceTechnique::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
                  ->orWhere(DB::raw('LOWER(description)'), 'like', '%' . strtolower($this->search) . '%');
            });
        }

        if ($this->categorieFilter) {
            $query->where('categorie', $this->categorieFilter);
        }

        $competencesTechniques = $query->orderBy('categorie', 'asc')
                                      ->orderBy('nom', 'asc')
                                      ->paginate(10);

        $categories = CompetenceTechnique::select('categorie')
                                        ->distinct()
                                        ->orderBy('categorie')
                                        ->pluck('categorie');

        return view('livewire.competences-techniques.table', compact('competencesTechniques', 'categories'));
    }
}
