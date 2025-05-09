<?php

namespace App\Livewire\CompetencesTechniques;

use App\Models\CompetenceTechnique;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?CompetenceTechnique $competenceTechnique;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $categorie = '';

    #[Validate]
    public $description = '';

    protected function rules()
    {
        return [
            'nom' => [
                'required',
                'string',
                'max:255',
                Rule::unique('competence_techniques', 'nom')->ignore($this->competenceTechnique)
            ],
            'categorie' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'nullable',
                'string'
            ],
        ];
    }

    public function setCompetenceTechnique(CompetenceTechnique $competenceTechnique)
    {
        $this->competenceTechnique = $competenceTechnique;
        $this->nom = $competenceTechnique->nom;
        $this->categorie = $competenceTechnique->categorie;
        $this->description = $competenceTechnique->description;
    }

    public function store()
    {
        $this->validate();
        CompetenceTechnique::create($this->only(['nom', 'categorie', 'description']));
    }

    public function update()
    {
        $this->validate();
        $this->competenceTechnique->update($this->only(['nom', 'categorie', 'description']));
    }
}
