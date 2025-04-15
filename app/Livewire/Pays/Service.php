<?php

namespace App\Livewire\Pays;

use App\Models\Pays;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Pays $pays;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $code_iso = '';

    #[Validate]
    public $nationalite = '';

    protected function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'code_iso' => [
                'required',
                'string',
                'size:2',
                Rule::unique('pays', 'code_iso')->ignore($this->pays)
            ],
            'nationalite' => 'required|string|max:255',
        ];
    }

    public function setPays(Pays $pays)
    {
        $this->pays = $pays;
        $this->nom = $pays->nom;
        $this->code_iso = $pays->code_iso;
        $this->nationalite = $pays->nationalite;
    }

    public function store()
    {
        $this->validate();
        $this->formatCodeIso();
        Pays::create($this->only(['nom', 'code_iso', 'nationalite']));
    }

    public function update()
    {
        $this->validate();
        $this->formatCodeIso();
        $this->pays->update($this->only(['nom', 'code_iso', 'nationalite']));
    }

    public function formatCodeIso()
    {
        $this->code_iso = strtoupper($this->code_iso);
    }
}
