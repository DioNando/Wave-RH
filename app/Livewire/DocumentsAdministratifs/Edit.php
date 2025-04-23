<?php

namespace App\Livewire\DocumentsAdministratifs;

use App\Models\Collaborateur;
use App\Models\DocumentAdministratif;
use App\Models\TypeDocument;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Service $form;

    public function mount(DocumentAdministratif $documentAdministratif)
    {
        $this->form->setDocumentAdministratif($documentAdministratif);
    }

    public function update()
    {
        $this->form->update();
        // return redirect()->route('documents-administratifs.index')->with('success', 'Document mis à jour avec succès');
        return $this->redirectRoute('documents-administratifs.index', [
            'success' => 'Document mis à jour avec succès'
        ]);
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
        return view('livewire.documents-administratifs.edit', compact('collaborateurs', 'types_documents'));
    }
}
