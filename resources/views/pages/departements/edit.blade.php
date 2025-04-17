<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier un departement {{ $departement->nom }}" />
    </x-slot>
    <div>
        <livewire:departements.edit :departement="$departement ?? null" />
    </div>
</x-app-layout>
