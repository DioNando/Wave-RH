<?php

namespace App\Livewire\Langues;

use App\Models\Langue;
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
        $langues = Langue::where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orWhere(DB::raw('LOWER(code)'), 'like', '%' . strtolower($this->search) . '%')
            ->orderBy('nom', 'asc')
            ->paginate(10);

        return view('livewire.langues.table', compact('langues'));
    }
}
