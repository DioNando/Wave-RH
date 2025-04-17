<?php

namespace App\Livewire\TypesDocuments;

use App\Models\TypeDocument;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(TypeDocument $typeDocument)
    {
        $this->form->setTypeDocument($typeDocument);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('types-documents.index')->with('success', $this->form->libelle . ' ajouté avec succès');
    }

    public function render()
    {
        return view('livewire.types-documents.create');
    }
}
