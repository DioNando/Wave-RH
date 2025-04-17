<?php

namespace App\Livewire\TypesDocuments;

use App\Models\TypeDocument;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
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
        $typesDocuments = TypeDocument::where(DB::raw('LOWER(libelle)'), 'like', '%' . strtolower($this->search) . '%')
            ->orWhere(DB::raw('LOWER(description)'), 'like', '%' . strtolower($this->search) . '%')
            ->orderBy('libelle', 'asc')
            ->paginate(5);

        return view('livewire.types-documents.table', compact('typesDocuments'));
    }
}
