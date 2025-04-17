<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier un poste {{ $poste->nom }}" />
    </x-slot>
    <div>
        <livewire:postes.edit :poste="$poste ?? null" />
    </div>
</x-app-layout>
