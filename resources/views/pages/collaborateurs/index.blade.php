<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Collaborateurs" />
    </x-slot>
    <div x-data="{ openFilters: false }">
        <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            <livewire:table.searchbar />
            <x-button.outlined type="button" @click="openFilters = !openFilters" color="gray" responsive
                icon="heroicon-o-funnel">
                Filtres</x-button.outlined>
            <livewire:table.column-selector />
            <x-button.primary href="{{ route('collaborateurs.create') }}" responsive icon="heroicon-o-plus">
                {{ __('Ajouter un collaborateur') }}
            </x-button.primary>
        </div>
        <div x-show="openFilters" x-cloak>
            <livewire:collaborateurs.filters />
        </div>
        <livewire:collaborateurs.table />
    </div>
</x-app-layout>
