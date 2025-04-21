@php
    $headers = ['Nom', 'Code ISO', 'Nationalité', 'Nombre de régions', 'Nombre de villes', 'Statut', ''];
    $empty = 'Aucun pays trouvé';
@endphp

<div>
    <x-table.table :headers="$headers">
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($pays as $row)
                <tr>
                    <x-table.cell class="font-medium" :content="$row->nom" />
                    <x-table.cell :content="$row->code_iso" />
                    <x-table.cell :content="$row->nationalite" />
                    <x-table.cell :content="$row->regions_count" />
                    <x-table.cell :content="$row->villes_count" />
                    <x-table.cell>
                        <x-badge.statut :statut="$row->statut" />
                    </x-table.cell>
                    <x-table.cell>
                        <x-button.action route="pays.edit" :id="$row->id" icon="pencil-square" color="orange" />
                    </x-table.cell>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="text-center py-5 text-gray-500 dark:text-gray-400">
                        {{ $empty }}
                    </td>
                </tr>
            @endforelse
        </x-table.body>
    </x-table.table>
    <nav class="mt-3">
        {{ $pays->onEachSide(1)->links('pagination::tailwind') }}
    </nav>
</div>
