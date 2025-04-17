<?php

namespace App\Livewire\Regions;

use App\Models\Pays;
use App\Models\Region;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(Region $region)
    {
        $this->form->setRegion($region);
    }
    public function update()
    {
        $this->form->update();
        return redirect()->route('regions.index')->with('success', $this->form->nom . ' mis à jour avec succès');
    }

    public function render()
    {
        $pays = Pays::orderBy('nom', 'asc')->get();
        return view('livewire.regions.edit', compact('pays'));
    }
}
