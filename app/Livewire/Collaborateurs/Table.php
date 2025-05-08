<?php

namespace App\Livewire\Collaborateurs;

use App\Models\Collaborateur;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'nom';
    public $sortDirection = 'asc';
    public $visibleColumns = ['nom', 'poste', 'contact', 'ville', 'statut'];
    public $filters = [];

    public $allColumns = [
        'nom' => ['content' => 'Nom', 'align' => 'text-left'],
        'poste' => ['content' => 'Poste', 'align' => 'text-left'],
        'matricule_interne' => ['content' => 'Matricule Interne', 'align' => 'text-left'],
        'information_bancaires' => ['content' => 'Informations Bancaires', 'align' => 'text-left'],
        'contact' => ['content' => 'Contact', 'align' => 'text-left'],
        'ville' => ['content' => 'Ville', 'align' => 'text-left'],
        'statut' => ['content' => 'Statut', 'align' => 'text-center'],
        'date_embauche' => ['content' => 'Date d\'embauche', 'align' => 'text-left'],
        'created_at' => ['content' => 'Création', 'align' => 'text-left'],
        'updated_at' => ['content' => 'Modification', 'align' => 'text-left'],
    ];

    protected $updatesQueryString = ['search', 'sortField', 'sortDirection'];

    protected $listeners = [
        'searchUpdated' => 'updateSearch',
        'sortFieldUpdated' => 'sortBy',
        'sortDirectionUpdated' => 'updateSortDirection',
        'filterFieldsUpdated' => 'updateFilterFields',
        'filtersUpdated',
    ];

    public function updateSearch($search)
    {
        $this->search = $search;
        $this->sortField = 'nom';
        $this->resetPage();
    }

    public function updateSortDirection($direction)
    {
        $this->sortDirection = $direction;
        $this->resetPage();
    }

    public function updateFilterFields($fields)
    {
        $this->visibleColumns = $fields;
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function filtersUpdated($filters)
    {
        $this->filters = $filters;
        $this->resetPage();
    }

    public function render()
    {
        $query = Collaborateur::query()
            ->with(['ville.pays', 'user', 'information_bancaires'])
            ->with(['historique_postes' => function ($query) {
                $query->latest()->limit(1)
                    ->with(['poste' => function ($query) {
                        $query->with('departement');
                    }]);
            }]);
        // $query = Collaborateur::query()
        //     ->with(['ville.pays', 'user']);

        // 🔍 Recherche par nom, prénom ou email
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->whereRaw('LOWER(nom) LIKE ?', ['%' . strtolower($this->search) . '%'])
                    ->orWhereRaw('LOWER(prenom) LIKE ?', ['%' . strtolower($this->search) . '%'])
                    ->orWhereRaw('LOWER(email_professionnel) LIKE ?', ['%' . strtolower($this->search) . '%']);
            });
        }

        // 📅 Filtre par date d'embauche
        // Todo : alternative de datarange
        if (!empty($this->filters['daterange'])) {
            [$start, $end] = explode(' - ', $this->filters['daterange']);
            $query->whereBetween('date_embauche', [$start, $end]);
        }
        if (!empty($this->filters['start']) && !empty($this->filters['end'])) {
            $query->whereBetween('date_embauche', [$this->filters['start'], $this->filters['end']]);
        }

        // 🏳️ Filtre par genre
        if (!empty($this->filters['genre'])) {
            $query->whereIn('genre', $this->filters['genre']);
        }

        // 🏢 Filtre par statut
        if (!empty($this->filters['statut'])) {
            $query->whereIn('statut', $this->filters['statut']);
        }

        // 🌍 Filtre par pays
        // if (!empty($this->filters['pays_id'])) {
        //     $query->where('pays_id', $this->filters['pays_id']);
        // }
        if (!empty($this->filters['pays_id'])) {
            $query->whereHas('ville', function ($q) {
                $q->where('pays_id', $this->filters['pays_id']);
            });
        }

        // 🔀 Tri dynamique
        $query->orderBy($this->sortField, $this->sortDirection);

        // 📜 Pagination
        $collaborateurs = $query->paginate(10);

        // Préparer les headers selon le nouveau format
        $headers = [];

        // Ajouter une colonne d'actions vide alignée à gauche au début
        $headers[] = ['content' => '', 'align' => 'text-left'];

        // Ajouter les colonnes visibles
        foreach($this->visibleColumns as $column) {
            if(isset($this->allColumns[$column])) {
                $headers[] = $this->allColumns[$column];
            }
        }

        // Ajouter une colonne d'actions vide alignée à droite à la fin
        $headers[] = ['content' => '', 'align' => 'text-right'];

        return view('livewire.collaborateurs.table', [
            'collaborateurs' => $collaborateurs,
            'visibleColumns' => $this->visibleColumns,
            'headers' => $headers
        ]);
    }
}
