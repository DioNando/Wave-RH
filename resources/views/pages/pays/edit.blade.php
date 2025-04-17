<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier un pays {{ $pays->nom }}" />
    </x-slot>
    <div>
        <livewire:pays.edit :pays="$pays ?? null" />
    </div>
</x-app-layout>
