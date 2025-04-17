<?php

namespace App\Livewire\TypesDocuments;

use App\Models\TypeDocument;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(TypeDocument $typeDocument)
    {
        $this->form->setTypeDocument($typeDocument);
    }

    public function update()
    {
        $this->form->update();
        return redirect()->route('types-documents.index')->with('success', $this->form->libelle . ' modifié avec succès');
    }

    public function render()
    {
        return view('livewire.types-documents.edit');
    }
}
