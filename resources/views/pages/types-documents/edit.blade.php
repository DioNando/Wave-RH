<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-label.page-title label="Modifier un type de document {{ $typeDocument->nom }}" />
            <div>
                @livewire('actions.delete', [
                    'modelId' => $typeDocument->id,
                    'modelType' => 'type de document',
                    'redirectRoute' => 'types-documents',
                    'entity' => $typeDocument,
                    'buttonLabel' => 'Supprimer',
                    'body' => 'Êtes-vous sûr de vouloir supprimer le type de document <strong>' . $typeDocument->nom . '</strong> ? Cette action est irréversible et supprimera également tous les documents associés.'
                ])
            </div>
        </div>
    </x-slot>
    <div>
        <livewire:types-documents.edit :typeDocument="$typeDocument ?? null" />
    </div>
</x-app-layout>
