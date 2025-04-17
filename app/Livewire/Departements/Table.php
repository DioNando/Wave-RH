<?php

namespace App\Livewire\Departements;

use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    protected $listeners = ['searchUpdated' => 'updateSearch'];

    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function render()
    {
        $departements = Departement::withCount(['postes'])
            ->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orderBy('nom', 'asc')->paginate(5);

        return view('livewire.departements.table', compact('departements'));
    }
}
