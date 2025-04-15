@php
    $headers = [
        'Nom',
        'Pays',
        'Nombre de villes',
        'Statut',
        'Actions',
    ];
    $empty = 'Aucunne région trouvée';
@endphp

<div>
    <x-table.table :headers="$headers">

    </x-table.table>
</div>
