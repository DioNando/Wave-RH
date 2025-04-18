<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier un document administratif {{ $document->libelle }}" />
    </x-slot>
    <div>
        <livewire:documents-administratifs.edit :documentAdministratif="$documentAdministratif ?? null" />
    </div>
</x-app-layout>
