<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-label.page-title label="Modifier un poste {{ $poste->nom }}" />
            <div>
                @livewire('actions.delete', [
                    'modelId' => $poste->id,
                    'modelType' => 'poste',
                    'redirectRoute' => 'postes',
                    'entity' => $poste,
                    'buttonLabel' => 'Supprimer',
                    'body' => 'Êtes-vous sûr de vouloir supprimer le poste <strong>' . $poste->nom . '</strong> ? Cette action est irréversible et supprimera également toutes les données associées.'
                ])
            </div>
        </div>
    </x-slot>
    <div>
        <livewire:postes.edit :poste="$poste ?? null" />
    </div>
</x-app-layout>
