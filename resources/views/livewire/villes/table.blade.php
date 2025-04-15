@php
    $headers = [
        'Nom',
        'Région',
        'Pays',
        'Statut',
        'Actions',
    ];
    $empty = 'Aucunne ville trouvée';
@endphp

<div>
    <x-table.table :headers="$headers">

    </x-table.table>
</div>
