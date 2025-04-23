<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Jours fériés" />
    </x-slot>
    <div>
        <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            {{-- <livewire:table.searchbar /> --}}
            <x-button.primary href="{{ route('jours-feries.create') }}" responsive icon="heroicon-o-plus">
                {{ __('Ajouter un jour férié') }}
            </x-button.primary>
        </div>
        <livewire:jours-feries.calendar />
        <livewire:jours-feries.table />
    </div>
</x-app-layout>
