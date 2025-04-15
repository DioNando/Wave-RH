<?php

namespace App\Livewire\Regions;

use App\Models\Region;
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
        $regions = Region::withCount(['villes'])
            ->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orWhereHas('pays', function($query) {
                $query->where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%');
            })
            ->with('pays')->orderBy('nom', 'asc')->paginate(5);

        return view('livewire.regions.table', compact('regions'));
    }
}
