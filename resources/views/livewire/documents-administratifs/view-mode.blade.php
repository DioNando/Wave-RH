<div x-data="{ openFilters: true }">
    <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
        <livewire:table.searchbar />
        <x-button.outlined @click="openFilters = !openFilters" type="button" color="gray" responsive
            icon="heroicon-o-funnel">
            Filtres</x-button.outlined>
        <span class="isolate inline-flex rounded-md">
            <button wire:click="$set('viewMode', 'table')"
                class="relative inline-flex items-center px-3 py-2 text-sm font-semibold ring-1 ring-inset rounded-l-md ring-gray-400 hover:bg-gray-50 focus:z-10 {{ $viewMode === 'table' ? 'bg-gray-200 text-blue-500' : 'text-gray-500' }} dark:ring-gray-500 dark:hover:bg-gray-700 dark:focus:z-10 dark:{{ $viewMode === 'table' ? 'bg-gray-700 text-blue-400' : 'text-gray-400' }}">
                <span class="sr-only">Liste</span>
                <x-heroicon-o-list-bullet class="size-5" />
            </button>
            <button wire:click="$set('viewMode', 'grid')"
                class="relative -ml-px inline-flex items-center px-3 py-2 text-sm font-semibold ring-1 ring-inset rounded-r-md ring-gray-400 hover:bg-gray-50 focus:z-10 {{ $viewMode === 'grid' ? 'bg-gray-200 text-blue-500' : 'text-gray-500' }} dark:ring-gray-500 dark:hover:bg-gray-700 dark:focus:z-10 dark:{{ $viewMode === 'grid' ? 'bg-gray-700 text-blue-400' : 'text-gray-400' }}">
                <span class="sr-only">Grille</span>
                <x-heroicon-o-squares-2x2 class="size-5" />
            </button>
        </span>
        <x-button.primary href="{{ route('documents-administratifs.create') }}" responsive icon="heroicon-o-plus">
            {{ __('Ajouter un document') }}
        </x-button.primary>
    </div>
    <div x-show="openFilters" x-cloak>
        <livewire:documents-administratifs.filters />
    </div>

    @if ($viewMode === 'table')
        <livewire:documents-administratifs.table />
    @else
        <livewire:documents-administratifs.grid />
    @endif

</div>
