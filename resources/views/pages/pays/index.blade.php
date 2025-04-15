<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Pays" />
    </x-slot>
    <div>
        <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            <livewire:table.searchbar />
            <x-button.primary href="{{ route('pays.create') }}" responsive icon="heroicon-o-plus">
                {{ __('Ajouter un pays') }}
            </x-button.primary>
        </div>
        <livewire:pays.table />
    </div>
</x-app-layout>
