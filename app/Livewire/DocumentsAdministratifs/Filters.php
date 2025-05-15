<?php

namespace App\Livewire\DocumentsAdministratifs;

use App\Models\Collaborateur;
use App\Models\TypeDocument;
use Livewire\Component;

class Filters extends Component
{
    public $type_document_id = [3,2];
    public $statut = [];
    public $date_emission_start = '';
    public $date_emission_end = '';
    public $date_expiration_start = '';
    public $date_expiration_end = '';
    public $collaborateur_id = '';

    protected $listeners = ['resetFilters'];

    // Add property to treat arrays properly
    protected $casts = [
        'type_document_id' => 'array',
        'statut' => 'array',
    ];

    public function mount()
    {
        // Ensure arrays are properly initialized
        $this->type_document_id = is_array($this->type_document_id) ? $this->type_document_id : [];
        $this->statut = is_array($this->statut) ? $this->statut : [];
    }

    // Handle updating with correct type conversion
    public function updatedTypeDocumentId($value)
    {
        // Ensure we're always dealing with an array
        if (!is_array($value)) {
            $this->type_document_id = [$value];
        }
        $this->updated();
    }

    public function updated($field = null)
    {
        // Make sure we're working with arrays
        if (!is_array($this->type_document_id)) {
            $this->type_document_id = is_null($this->type_document_id) ? [] : [$this->type_document_id];
        }

        if (!is_array($this->statut)) {
            $this->statut = is_null($this->statut) ? [] : [$this->statut];
        }

        $this->dispatch('filtersUpdated', [
            'type_document_id' => $this->type_document_id,
            'statut' => $this->statut,
            'date_emission_start' => $this->date_emission_start,
            'date_emission_end' => $this->date_emission_end,
            'date_expiration_start' => $this->date_expiration_start,
            'date_expiration_end' => $this->date_expiration_end,
            'collaborateur_id' => $this->collaborateur_id,
        ]);
    }

    // Process received values only when the form is submitted
    public function filters()
    {
        // Make sure we handle JSON string if it comes in that format
        if (is_string($this->type_document_id) && $this->isJson($this->type_document_id)) {
            $this->type_document_id = json_decode($this->type_document_id, true);
        }

        // if (is_string($this->statut) && $this->isJson($this->statut)) {
        //     $this->statut = json_decode($this->statut, true);
        // }

        // Ensure we always have arrays
        $this->type_document_id = is_array($this->type_document_id) ? $this->type_document_id : [];
        $this->statut = is_array($this->statut) ? $this->statut : [];

        $this->dispatch('filtersUpdated', [
            'type_document_id' => $this->type_document_id,
            'statut' => $this->statut,
            'date_emission_start' => $this->date_emission_start,
            'date_emission_end' => $this->date_emission_end,
            'date_expiration_start' => $this->date_expiration_start,
            'date_expiration_end' => $this->date_expiration_end,
            'collaborateur_id' => $this->collaborateur_id,
        ]);
    }

    public function resetFilters()
    {
        $this->reset();
        // $this->type_document_id = [];
        // $this->statut = [];
        $this->dispatch('filtersUpdated', []);
    }

    // Helper function to check if a string is JSON
    private function isJson($string) {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function render()
    {
        $typeDocuments = TypeDocument::orderBy('libelle', 'asc')->get();
        $collaborateurs = Collaborateur::orderBy('nom', 'asc')
            ->orderBy('prenom', 'asc')
            ->get()
            ->map(function ($collaborateur) {
                $collaborateur->nom_complet = $collaborateur->nom . ' ' . $collaborateur->prenom;
                return $collaborateur;
            });

        return view('livewire.documents-administratifs.filters', compact('typeDocuments', 'collaborateurs'));
    }
}
