<?php

namespace App\Livewire\DocumentsAdministratifs;

use App\Models\Collaborateur;
use App\Models\TypeDocument;
use Livewire\Component;

class Filters extends Component
{
    public $type_document_id = [3,4];
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
        // Handle the value from the multiselect component
        if (is_string($value) && $this->isJson($value)) {
            // If JSON string received, convert it to array
            $this->type_document_id = array_map('intval', json_decode($value, true));
        } elseif (!is_array($value)) {
            // If single value and not JSON, make it an array
            $this->type_document_id = [$value];
        } else {
            // If it's already an array, make sure all values are integers
            $this->type_document_id = array_map('intval', $value);
        }

        // Dispatch the updated event
        $this->dispatchFiltersUpdatedEvent();
    }

    public function updatedStatut($value)
    {
        // Ensure statut is always an array
        if (!is_array($value)) {
            $this->statut = is_null($value) ? [] : [$value];
        }

        // Dispatch the updated event
        $this->dispatchFiltersUpdatedEvent();
    }

    public function updated($field = null)
    {
        // Only handle fields that don't have specific updated* methods
        if (!in_array($field, ['type_document_id', 'statut'])) {
            $this->dispatchFiltersUpdatedEvent();
        }
    }

    /**
     * Helper method to dispatch the filtersUpdated event
     */
    private function dispatchFiltersUpdatedEvent()
    {
        // Ensure type_document_id and statut are arrays
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

    // Process received values when the form is submitted
    public function filters()
    {
        // Handle JSON string for type_document_id if needed
        if (is_string($this->type_document_id) && $this->isJson($this->type_document_id)) {
            $this->type_document_id = array_map('intval', json_decode($this->type_document_id, true));
        }

        // Ensure we always have arrays with integers for IDs
        if (is_array($this->type_document_id)) {
            $this->type_document_id = array_map('intval', $this->type_document_id);
        } else {
            $this->type_document_id = [];
        }

        // Ensure statut is always an array
        $this->statut = is_array($this->statut) ? $this->statut : [];

        // Dispatch the filters updated event
        $this->dispatchFiltersUpdatedEvent();
    }

    public function resetFilters()
    {
        // Reset all properties to their initial values
        $this->reset();

        // Ensure arrays are reset properly
        $this->type_document_id = [];
        $this->statut = [];

        // Notify any JS components about the reset
        $this->dispatch('multiselect:reset');

        // Dispatch filters updated event
        $this->dispatchFiltersUpdatedEvent();
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
