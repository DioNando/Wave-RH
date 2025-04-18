<?php

namespace App\Livewire\DocumentsAdministratifs;

use App\Models\DocumentAdministratif;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'nom'; // nom, prenom, date
    public $sortDirection = 'asc';
    public $filters = [];

    protected $updatesQueryString = ['search'];

    protected $listeners = [
        'searchUpdated' => 'updateSearch',
        'filtersUpdated' => 'updateFilters'
    ];

    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function updateFilters($filters)
    {
        $this->filters = $filters;
        $this->resetPage();
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
            : 'asc';
        $this->sortBy = $field;
    }

    public function render()
    {
        $query = DocumentAdministratif::with(['collaborateur', 'typeDocument']);

        if ($this->search) {
            $query->where(function($q) {
                $q->whereHas('collaborateur', function($q) {
                    $q->where('nom', 'ilike', '%' . $this->search . '%')
                      ->orWhere('prenom', 'ilike', '%' . $this->search . '%');
                })
                ->orWhereHas('typeDocument', function($q) {
                    $q->where('libelle', 'ilike', '%' . $this->search . '%');
                });
            });
        }

        if (!empty($this->filters['type_document_id'])) {
            $query->whereIn('type_document_id', $this->filters['type_document_id']);
        }

        if (!empty($this->filters['statut'])) {
            $query->whereIn('statut', $this->filters['statut']);
        }

        if (!empty($this->filters['date_emission_start']) && !empty($this->filters['date_emission_end'])) {
            $query->whereBetween('date_emission', [
                $this->filters['date_emission_start'],
                $this->filters['date_emission_end']
            ]);
        }

        if (!empty($this->filters['date_expiration_start']) && !empty($this->filters['date_expiration_end'])) {
            $query->whereBetween('date_expiration', [
                $this->filters['date_expiration_start'],
                $this->filters['date_expiration_end']
            ]);
        }

        if (!empty($this->filters['collaborateur_id'])) {
            $query->where('collaborateur_id', $this->filters['collaborateur_id']);
        }

        $documentsAdministratifs = $query
            ->orderBy('collaborateur_id')
            ->orderBy('date_emission', 'desc')
            ->get()
            ->groupBy('collaborateur_id')
            ->map(function ($documents) {
                return [
                    'collaborateur' => $documents->first()->collaborateur,
                    'documents' => $documents,
                    'count' => $documents->count(),
                    'latest_date' => $documents->max('date_emission'),
                ];
            })
            ->sortBy(function ($item) {
                return match($this->sortBy) {
                    'nom' => $item['collaborateur']->nom,
                    'prenom' => $item['collaborateur']->prenom,
                    'date' => $item['latest_date'],
                    default => $item['collaborateur']->nom,
                };
            }, SORT_REGULAR, $this->sortDirection === 'desc');

        return view('livewire.documents-administratifs.table', compact('documentsAdministratifs'));
    }
}
