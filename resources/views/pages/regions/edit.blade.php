<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier une région {{ $region->nom }}" />
    </x-slot>
    <div>
        <livewire:regions.edit :region="$region ?? null" />
    </div>
</x-app-layout>
