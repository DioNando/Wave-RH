<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-label.page-title label="Modifier un departement {{ $departement->nom }}" />
            <div>
                @livewire('actions.delete', [
                    'modelId' => $departement->id,
                    'modelType' => 'département',
                    'redirectRoute' => 'departements',
                    'entity' => $departement,
                    'buttonLabel' => 'Supprimer',
                    'body' => 'Êtes-vous sûr de vouloir supprimer le département <strong>' . $departement->nom . '</strong> ? Cette action est irréversible et supprimera également tous les postes et collaborateurs associés.'
                ])
            </div>
        </div>
    </x-slot>
    <div>
        <livewire:departements.edit :departement="$departement ?? null" />
    </div>
</x-app-layout>
