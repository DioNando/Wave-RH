<?php

namespace App\Livewire\Regions;

use App\Models\Pays;
use App\Models\Region;
use Livewire\Component;

class Create extends Component
{
    public Service $form;

    public function mount(Region $region)
    {
        $this->form->setRegion($region);
    }

    public function store()
    {
        $this->form->store();
        return redirect()->route('regions.index')->with('success', $this->form->nom . ' ajouté avec succès');
    }

    public function render()
    {
        $pays = Pays::orderBy('nom', 'asc')->get();
        return view('livewire.regions.create', compact('pays'));
    }
}
