<?php

namespace App\Livewire\Table;

use Livewire\Component;

class ColumnSelector extends Component
{
    public $sortDirection = 'asc';
    public $filterFields = ['nom', 'poste', 'contact', 'ville', 'statut'];

    public function updatedSortDirection()
    {
        $this->dispatch('sortDirectionUpdated', $this->sortDirection);
    }

    public function updatedFilterFields()
    {
        $this->dispatch('filterFieldsUpdated', $this->filterFields);
    }

    public function render()
    {
        return view('livewire.table.column-selector');
    }
}
