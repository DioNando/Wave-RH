<?php

namespace App\Livewire\Villes;

use App\Models\Pays;
use App\Models\Region;
use App\Models\Ville;
use Livewire\Component;

class Edit extends Component
{
    public Service $form;

    public function mount(Ville $ville)
    {
        $this->form->setVille($ville);
        $this->form->pays_id = $ville->pays_id ?? Pays::orderBy('nom', 'asc')->first()->id ?? '';
        $this->updateRegions();
    }

    public function update()
    {
        $this->form->update();
        return redirect()->route('villes.index')->with('success', $this->form->nom . ' mis à jour avec succès');
    }

    public function getRegionsProperty()
    {
        return $this->form->pays_id
            ? Region::where('pays_id', $this->form->pays_id)->orderBy('nom', 'asc')->get()
            : collect();
    }

    public function updatedFormPaysId()
    {
        $this->updateRegions();
    }

    private function updateRegions()
    {
        $this->form->region_id = Region::where('pays_id', $this->form->pays_id)->orderBy('nom', 'asc')->first()->id ?? '';
    }

    public function render()
    {
        $pays = Pays::orderBy('nom', 'asc')->get();
        $regions = $this->regions;

        return view('livewire.villes.edit', compact('pays', 'regions'));
    }
}
