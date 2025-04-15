@php
    $headers = ['Nom', 'Code ISO', 'Nationalité', 'Nombre de régions', 'Nombre de villes', 'Statut', 'Actions'];
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
                        <a href="{{ route('pays.edit', $row->id) }}"
                            class="inline-flex items-center p-2 text-sm text-white rounded-lg bg-orange-600 hover:bg-orange-700 dark:bg-orange-700 dark:hover:bg-orange-800 active:bg-orange-800 dark:active:bg-orange-900">
                            <x-heroicon-o-pencil-square class="size-4" />
                        </a>
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
    <nav class="mt-4">
        {{ $pays->links() }}
    </nav>
</div>
