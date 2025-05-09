<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier une langue {{ $langue->nom }}" />
    </x-slot>
    <div>
        <livewire:langues.edit :langue="$langue ?? null" />
    </div>
</x-app-layout>
