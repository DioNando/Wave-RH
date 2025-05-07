<?php

namespace App\Livewire\Table;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class SelectUserRole extends Component
{
    public $role;

    public function mount($role = null)
    {
        $this->role = $role;
    }

    public function updatedRole()
    {
        $this->dispatch('roleUpdated', $this->role);
    }

    public function render()
    {
        // Récupérer tous les rôles disponibles pour les options du sélecteur
        $roles = Role::all()->pluck('name');

        return view('livewire.table.select-user-role', [
            'roles' => $roles
        ]);
    }
}
