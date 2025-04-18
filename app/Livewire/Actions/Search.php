<?php

namespace App\Livewire\Actions;

use App\Models\Collaborateur;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    protected $updatesQueryString = ['search'];


    public function updateSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search !== '') {
            $collaborateurs = Collaborateur::where(DB::raw('LOWER(nom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orWhere(DB::raw('LOWER(prenom)'), 'like', '%' . strtolower($this->search) . '%')
            ->orWhere(DB::raw('LOWER(email_professionnel)'), 'like', '%' . strtolower($this->search) . '%')
            ->orderBy('nom')
            ->limit(5)
            ->get();
        } else {
            $collaborateurs = collect();
        }

        return view('livewire.actions.search', compact('collaborateurs'));
    }
}
