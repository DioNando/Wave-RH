@php
    $headers = [
        ['content' => 'Nom', 'align' => 'text-left'],
        ['content' => 'Code ISO', 'align' => 'text-center'],
        ['content' => 'Nationalité', 'align' => 'text-left'],
        ['content' => 'Nombre de régions', 'align' => 'text-right'],
        ['content' => 'Nombre de villes', 'align' => 'text-right'],
        ['content' => 'Statut', 'align' => 'text-left'],
        ['content' => '', 'align' => 'text-right'],
    ];
    $empty = 'Aucun pays trouvé';
@endphp

<div>
    <x-table.table :headers="$headers">
        <x-table.head>
            @foreach ($headers as $header)
                <x-table.head-cell :content="$header['content']" :align="$header['align']" />
            @endforeach
        </x-table.head>
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($pays as $row)
                <tr>
                    <x-table.cell class="font-medium" :content="$row->nom" />
                    <x-table.cell class="font-mono" align="center" :content="$row->code_iso" />
                    <x-table.cell class="text-gray-500" :content="$row->nationalite" />
                    <x-table.cell align="right" :content="$row->regions_count" />
                    <x-table.cell align="right" :content="$row->villes_count" />
                    <x-table.cell>
                        <x-badge.statut :statut="$row->statut" />
                    </x-table.cell>
                    <x-table.cell align="right">
                        <x-button.action simple="true" route="pays.edit" :id="$row->id" icon="pencil-square" color="orange">Editer</x-button.action>
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
