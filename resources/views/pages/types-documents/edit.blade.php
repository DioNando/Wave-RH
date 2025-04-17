<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier un type de document {{ $typeDocument->nom }}" />
    </x-slot>
    <div>
        <livewire:types-documents.edit :typeDocument="$typeDocument ?? null" />
    </div>
</x-app-layout>
