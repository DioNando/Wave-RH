<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $role = '';
    public $sortField = 'nom'; // Updated field name to match the database
    public $sortDirection = 'asc';

    protected $listeners = [
        'searchUpdated' => 'updateSearch',
        'roleUpdated' => 'updateRole',
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updateSearch($search)
    {
        // This method will be called when the search input is updated
        $this->search = $search;
        $this->resetPage(); // Reset to first page when searching
    }

    public function updateRole($role)
    {
        // This method will be called when the role is updated
        $this->role = $role;
        $this->resetPage(); // Reset to first page when filtering by role
    }

    public function deleteUser($userId)
    {
        // Vérifier si l'utilisateur n'est pas l'utilisateur actuel
        if (Auth::id() !== (int)$userId) {
            $user = User::find($userId);
            $userName = $user->prenom . ' ' . $user->nom;
            User::destroy($userId);
            session()->flash('message', "Utilisateur {$userName} supprimé avec succès.");
        } else {
            session()->flash('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
    }

    public function render()
    {
        $usersQuery = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nom', 'like', '%' . $this->search . '%')
                        ->orWhere('prenom', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            });

        // Filtre par rôle en utilisant Spatie Permission
        if ($this->role) {
            $usersQuery = $usersQuery->whereHas('roles', function ($query) {
                $query->where('name', $this->role);
            });
        }

        $users = $usersQuery
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.users.table', compact('users'));
    }
}
