<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-label.page-title label="Modifier une ville {{ $ville->nom }}" />
            <div>
                @livewire('actions.delete', [
                    'modelId' => $ville->id,
                    'modelType' => 'ville',
                    'redirectRoute' => 'villes',
                    'entity' => $ville,
                    'buttonLabel' => 'Supprimer',
                    'body' => 'Êtes-vous sûr de vouloir supprimer la ville <strong>' . $ville->nom . '</strong> ? Cette action est irréversible et supprimera également toutes les données associées.'
                ])
            </div>
        </div>
    </x-slot>
    <div>
        <livewire:villes.edit :ville="$ville ?? null" />
    </div>
</x-app-layout>
