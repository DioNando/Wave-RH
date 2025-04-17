<?php

namespace App\Livewire\Postes;

use App\Models\Poste;
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
        $postes = Poste::with('departement')
            ->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orWhereHas('departement', function ($query) {
                $query->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%');
            })
            ->orderBy('nom', 'asc')->paginate(5);

        return view('livewire.postes.table', compact('postes'));
    }
}
