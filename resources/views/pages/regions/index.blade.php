<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Régions" />
    </x-slot>
    <div>
        <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            <livewire:table.searchbar />
        </div>
        <livewire:regions.table />
    </div>
</x-app-layout>
