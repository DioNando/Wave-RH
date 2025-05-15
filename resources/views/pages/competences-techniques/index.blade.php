<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Compétences Techniques" />
    </x-slot>
    <div>
        <div class="my-3 flex items-start justify-end flex-wrap gap-3 sm:mt-0">
            <livewire:table.searchbar />
            <div class="flex items-center gap-3">
                <livewire:table.select-categorie />
                <x-button.primary href="{{ route('competences-techniques.create') }}" responsive icon="heroicon-o-plus">
                    {{ __('Ajouter une compétence technique') }}
                </x-button.primary>
            </div>
        </div>
        <livewire:competences-techniques.table />
    </div>
</x-app-layout>
