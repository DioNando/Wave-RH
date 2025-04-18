<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Détail d'un collaborateur" />
    </x-slot>

    <x-collaborateur.tabs>
        <x-collaborateur.profil-personnel :collaborateur="$collaborateur" />
        <x-collaborateur.profil-professionnel :collaborateur="$collaborateur" />
        <x-collaborateur.documents :collaborateur="$collaborateur" />
        <x-collaborateur.finances :collaborateur="$collaborateur" />
        <x-collaborateur.historique :collaborateur="$collaborateur" />
    </x-collaborateur.tabs>
</x-app-layout>
