<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-label.page-title label="Modifier une région {{ $region->nom }}" />
            <div>
                @livewire('actions.delete', [
                    'modelId' => $region->id,
                    'modelType' => 'région',
                    'redirectRoute' => 'regions',
                    'entity' => $region,
                    'buttonLabel' => 'Supprimer',
                    'body' => 'Êtes-vous sûr de vouloir supprimer la région <strong>' . $region->nom . '</strong> ? Cette action est irréversible et supprimera également toutes les données associées.'
                ])
            </div>
        </div>
    </x-slot>
    <div>
        <livewire:regions.edit :region="$region ?? null" />
    </div>
</x-app-layout>
