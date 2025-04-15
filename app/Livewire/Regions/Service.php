<?php

namespace App\Livewire\Regions;

use App\Models\Pays;
use App\Models\Region;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Region $region;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $pays_id = '';

    protected function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'pays_id' => 'required|exists:pays,id',
        ];
    }

    public function setRegion(Region $region)
    {
        $this->region = $region;
        $this->nom = $region->nom;
        $this->pays_id = $region->pays_id ?? Pays::orderBy('nom', 'asc')->first()->id ?? '';
    }

    public function store()
    {
        $this->validate();
        Region::create($this->only(['nom', 'pays_id']));
    }

    public function update()
    {
        $this->validate();
        $this->region->update($this->only(['nom', 'pays_id']));
    }
}
