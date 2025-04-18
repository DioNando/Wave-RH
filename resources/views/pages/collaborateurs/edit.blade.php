<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Modifier un collaborateur" />
    </x-slot>
    <div>
        <livewire:collaborateurs.edit :collaborateur="$collaborateur ?? null" />
    </div>
</x-app-layout>
