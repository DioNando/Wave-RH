<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Langues" />
    </x-slot>
    <div>
        <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            <livewire:table.searchbar />
            <x-button.primary href="{{ route('langues.create') }}" responsive icon="heroicon-o-plus">
                {{ __('Ajouter une langue') }}
            </x-button.primary>
        </div>
        <livewire:langues.table />
    </div>
</x-app-layout>
