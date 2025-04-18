<?php

namespace App\Livewire\DocumentsAdministratifs;

use App\Models\Collaborateur;
use App\Models\DocumentAdministratif;
use App\Models\TypeDocument;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Service $form;

    public function mount(DocumentAdministratif $documentAdministratif)
    {
        $this->form->setDocumentAdministratif($documentAdministratif);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('documents-administratifs.index')->with('success', 'Document ajouté avec succès');
    }

    public function render()
    {
        $collaborateurs = Collaborateur::orderBy('nom', 'asc')
            ->get()
            ->map(function ($collaborateur) {
                $collaborateur->nom_complet = $collaborateur->nom . ' ' . $collaborateur->prenom;
                return $collaborateur;
            });
        $types_documents = TypeDocument::orderBy('libelle', 'asc')->get();
        return view('livewire.documents-administratifs.create', compact('collaborateurs', 'types_documents'));
    }
}
