<?php

namespace App\Livewire\TypesDocuments;

use App\Models\TypeDocument;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Service extends Form
{
    public ?TypeDocument $typeDocument;

    #[Validate]
    public $libelle = '';

    #[Validate]
    public $description = '';

    #[Validate]
    public $couleur = '';

    protected function rules()
    {
        return [
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'couleur' => 'required|string|max:50',
        ];
    }

    public function setTypeDocument(TypeDocument $typeDocument)
    {
        $this->typeDocument = $typeDocument;
        $this->libelle = $typeDocument->libelle;
        $this->description = $typeDocument->description;
        $this->couleur = $typeDocument->couleur ?? 'gray';
    }

    public function store()
    {
        $this->validate();
        TypeDocument::create($this->only(['libelle', 'description', 'couleur']));
    }

    public function update()
    {
        $this->validate();
        $this->typeDocument->update($this->only(['libelle', 'description', 'couleur']));
    }
}
