<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier une ville {{ $ville->nom }}" />
    </x-slot>
    <div>
        <livewire:villes.edit :ville="$ville ?? null" />
    </div>
</x-app-layout>
