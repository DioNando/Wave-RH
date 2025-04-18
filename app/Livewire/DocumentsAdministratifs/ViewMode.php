<?php

namespace App\Livewire\DocumentsAdministratifs;

use Livewire\Component;

class ViewMode extends Component
{
    public $viewMode = 'table';

    public function mount()
    {
        // Récupérer le mode de vue depuis la session si disponible
        $this->viewMode = session('documents_view_mode', 'table');
    }

    public function updatedViewMode($value)
    {
        // Sauvegarder le mode de vue dans la session
        session(['documents_view_mode' => $value]);
    }

    public function render()
    {
        return view('livewire.documents-administratifs.view-mode');
    }
}
