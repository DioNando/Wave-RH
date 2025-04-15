<?php

namespace App\Livewire\Pays;

use App\Models\Pays;
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
        $pays = Pays::withCount(['villes', 'regions'])
            ->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orderBy('nom', 'asc')
            ->paginate(5);

        return view('livewire.pays.table', compact('pays'));
    }
}
