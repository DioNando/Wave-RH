<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-label.page-title label="Modifier un pays {{ $pays->nom }}" />
            <div>
                @livewire('actions.delete', [
                    'modelId' => $pays->id,
                    'modelType' => 'pays',
                    'redirectRoute' => 'pays',
                    'entity' => $pays,
                    'buttonLabel' => 'Supprimer',
                    'body' => 'Êtes-vous sûr de vouloir supprimer le pays <strong>' . $pays->nom . '</strong> ? Cette action est irréversible et supprimera également toutes les données associées.'
                ])
            </div>
        </div>
    </x-slot>
    <div>
        <livewire:pays.edit :pays="$pays ?? null" />
    </div>
</x-app-layout>
