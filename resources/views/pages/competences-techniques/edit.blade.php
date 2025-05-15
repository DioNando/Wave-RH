<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-label.page-title label="Modifier une compétence technique {{ $competenceTechnique->nom }}" />
            <div>
                @livewire('actions.delete', [
                    'modelId' => $competenceTechnique->id,
                    'modelType' => 'compétence technique',
                    'redirectRoute' => 'competences-techniques',
                    'entity' => $competenceTechnique,
                    'buttonLabel' => 'Supprimer',
                    'body' => 'Êtes-vous sûr de vouloir supprimer la compétence technique <strong>' . $competenceTechnique->nom . '</strong> ? Cette action est irréversible et supprimera également toutes les données associées.'
                ])
            </div>
        </div>
    </x-slot>
    <div>
        <livewire:competences-techniques.edit :competence-technique="$competenceTechnique ?? null" />
    </div>
</x-app-layout>
