<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Jours fériés" />
    </x-slot>
    <div>
        {{-- <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            <livewire:table.searchbar />
            <x-button.primary href="{{ route('jours-feries.create') }}" responsive icon="heroicon-o-plus">
                {{ __('Ajouter un jour férié') }}
            </x-button.primary>
        </div> --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
            <div class="col-span-4">
                <livewire:jours-feries.calendar />
            </div>
            <div class="col-span-1">
                <livewire:jours-feries.grid />
            </div>
        </div>
    </div>
</x-app-layout>
