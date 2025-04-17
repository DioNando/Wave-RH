<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Types de documents" />
    </x-slot>
    <div>
        <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            <livewire:table.searchbar />
            <x-button.primary href="{{ route('types-documents.create') }}" responsive icon="heroicon-o-plus">
                {{ __('Ajouter un type de document') }}
            </x-button.primary>
        </div>
        <livewire:types-documents.table />
    </div>
</x-app-layout>
