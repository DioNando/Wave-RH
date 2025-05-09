@php
    $headers = [
        ['content' => 'Nom', 'align' => 'text-left'],
        ['content' => 'Code', 'align' => 'text-center'],
        ['content' => '', 'align' => 'text-right'],
    ];
    $empty = 'Aucune langue trouvée';
@endphp

<div>
    <x-table.table :headers="$headers">
        <x-table.head>
            @foreach ($headers as $header)
                <x-table.head-cell :content="$header['content']" :align="$header['align']" />
            @endforeach
        </x-table.head>
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($langues as $row)
                <tr>
                    <x-table.cell class="font-medium" :content="$row->nom" />
                    <x-table.cell class="font-mono" align="center" :content="$row->code" />
                    <x-table.cell align="right">
                        <x-button.action simple="true" route="langues.edit" :id="$row->id" icon="pencil-square" color="orange">Editer</x-button.action>
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
        {{ $langues->onEachSide(1)->links('pagination::tailwind') }}
    </nav>
</div>
