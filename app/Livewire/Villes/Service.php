<?php

namespace App\Livewire\Villes;

use App\Models\Pays;
use App\Models\Region;
use App\Models\Ville;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Ville $ville;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $region_id = '';

    #[Validate]
    public $pays_id = '';

    protected function rules()
    {
        return [
            'nom' => [
                'required',
                'string',
                'max:255',
                Rule::unique('villes', 'nom')->ignore($this->ville)
            ],
            'pays_id' => 'required|exists:pays,id',
            'region_id' => 'required|exists:regions,id',
        ];
    }

    public function setVille(Ville $ville)
    {
        $this->ville = $ville;
        $this->nom = $ville->nom;
        $this->region_id = $ville->region_id;
        $this->pays_id = $ville->pays_id ?? Pays::orderBy('nom', 'asc')->first()->id ?? '';
    }

    public function store()
    {
        $this->validate();
        Ville::create($this->only(['nom', 'region_id', 'pays_id']));
    }

    public function update()
    {
        $this->validate();
        $this->ville->update($this->only(['nom', 'region_id', 'pays_id']));
    }
}
