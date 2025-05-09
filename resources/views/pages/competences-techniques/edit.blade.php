<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier une compétence technique {{ $competenceTechnique->nom }}" />
    </x-slot>
    <div>
        <livewire:competences-techniques.edit :competence-technique="$competenceTechnique ?? null" />
    </div>
</x-app-layout>
