<?php

namespace App\Livewire\Villes;

use App\Models\Ville;
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
        $villes = Ville::with('pays', 'region')
            ->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orWhereHas('pays', function($query) {
                $query->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%');
            })
            ->orWhereHas('region', function($query) {
                $query->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%');
            })
            ->orderBy('nom', 'asc')->paginate(5);

        return view('livewire.villes.table', compact('villes'));
    }
}
