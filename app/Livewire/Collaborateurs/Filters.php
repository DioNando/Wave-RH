<?php

namespace App\Livewire\Collaborateurs;

use App\Models\Departement;
use App\Models\Pays;
use App\Models\Poste;
use Livewire\Component;

class Filters extends Component
{
    public $daterange = ''; // Todo : alternative de datarange
    public $genre = [];
    public $statut = [];
    public $pays_id = '';
    public $start = '';
    public $end = '';
    public $departement_id = '';
    public $poste_id = '';

    protected $listeners = ['resetFilters'];

    public function mount() {
        $this->poste_id = $this->poste_id ?? Poste::orderBy('nom', 'asc')->first()->id ?? '';
        $this->departement_id = $this->departement_id ?? Departement::orderBy('nom', 'asc')->first()->id ?? '';
    }

    // ? deplacer vers function filters
    public function updated()
    {
        $this->dispatch('filtersUpdated', [
            'daterange' => $this->daterange, // ? alternative de datarange
            'start' => $this->start,
            'end' => $this->end,
            'genre' => $this->genre,
            'statut' => $this->statut,
            'pays_id' => $this->pays_id,
        ]);
    }

    public function getPostesProperty()
    {
        return $this->departement_id
            ? Poste::where('departement_id', $this->departement_id)->orderBy('nom', 'asc')->get()
            : collect();
    }

    public function filters() {
        $this->updated();
    }

    public function resetFilters()
    {
        $this->reset();
        $this->dispatch('filtersUpdated', []);
    }

    public function render()
    {
        $pays = Pays::orderBy('nom', 'asc')->get();
        $departements = Departement::orderBy('nom', 'asc')->get();
        $postes = $this->postes;
        return view('livewire.collaborateurs.filters', compact('pays', 'departements', 'postes'));
    }
}
