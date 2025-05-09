<?php

namespace App\Livewire\Langues;

use App\Models\Langue;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?Langue $langue;

    #[Validate]
    public $nom = '';

    #[Validate]
    public $code = '';

    protected function rules()
    {
        return [
            'nom' => [
                'required',
                'string',
                'max:255',
                Rule::unique('langues', 'nom')->ignore($this->langue)
            ],
            'code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('langues', 'code')->ignore($this->langue)
            ],
        ];
    }

    public function setLangue(Langue $langue)
    {
        $this->langue = $langue;
        $this->nom = $langue->nom;
        $this->code = $langue->code;
    }

    public function store()
    {
        $this->validate();
        $this->formatCode();
        Langue::create($this->only(['nom', 'code']));
    }

    public function update()
    {
        $this->validate();
        $this->formatCode();
        $this->langue->update($this->only(['nom', 'code']));
    }

    public function formatCode()
    {
        $this->code = strtolower($this->code);
    }
}
