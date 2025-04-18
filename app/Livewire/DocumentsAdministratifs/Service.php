<?php

namespace App\Livewire\DocumentsAdministratifs;

use App\Models\DocumentAdministratif;
use Livewire\Form;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Service extends Form
{
    use WithFileUploads;

    public ?DocumentAdministratif $documentAdministratif;

    #[Validate]
    public $type_document_id = '';

    #[Validate]
    public $date_emission = '';

    #[Validate]
    public $date_expiration = '';

    #[Validate]
    public $document_path;

    #[Validate]
    public $collaborateur_id = '';

    protected function rules()
    {
        return [
            'type_document_id' => ['required', Rule::exists('types_documents', 'id')],
            'date_emission' => 'date',
            'date_expiration' => 'required|date|after:date_emission',
            'document_path' => [
                Rule::when(!is_string($this->document_path), [
                    'required',
                    'file',
                    'mimes:pdf,doc,docx,jpg,jpeg,png',
                    'max:10240'
                ]),
            ],
            'collaborateur_id' => ['required', Rule::exists('collaborateurs', 'id')],
        ];
    }

    public function setDocumentAdministratif(DocumentAdministratif $documentAdministratif)
    {
        $this->documentAdministratif = $documentAdministratif;

        $this->type_document_id = $documentAdministratif->type_document_id;
        $this->date_emission = $documentAdministratif->date_emission;
        $this->date_expiration = $documentAdministratif->date_expiration;
        $this->document_path = $documentAdministratif->document_path;
        $this->collaborateur_id = $documentAdministratif->collaborateur_id;
    }

    public function store()
    {
        $this->validate();

        // Préparer les données
        $data = $this->all();

        // Gérer le document
        if ($this->document_path && !is_string($this->document_path)) {
            $documentPath = $this->document_path->storePubliclyAs(
                'documents_administratifs',
                'doc_' . time() . '_' . $this->document_path->hashName(),
                'public'
            );
            $data['document_path'] = $documentPath;
        }

        // Créer l'enregistrement avec les données
        DocumentAdministratif::create($data);
    }

    public function update()
    {
        $this->validate();

        // Préparer les données
        $data = $this->all();

        // Gérer le document
        if ($this->document_path && !is_string($this->document_path)) {
            $documentPath = $this->document_path->storePubliclyAs(
                'documents_administratifs',
                'doc_' . time() . '_' . $this->document_path->hashName(),
                'public'
            );
            $data['document_path'] = $documentPath;
        }

        // Mettre à jour l'enregistrement avec les données
        $this->documentAdministratif->update($data);
    }
}
