@php
    $headers = ['Nom', 'Description', 'Département', 'Statut', ''];
    $empty = 'Aucun poste trouvé';
@endphp

<div>
    <x-table.table :headers="$headers">
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($postes as $row)
                <tr>
                    <x-table.cell class="font-medium" :content="$row->nom" />
                    <x-table.cell>
                        <div class="flex items-center">
                            <span
                                class="truncate max-w-[150px] text-gray-700 dark:text-gray-400">{{ $row->description }}</span>
                        </div>
                    </x-table.cell>
                    <x-table.cell :content="$row->departement->nom" />
                    <x-table.cell>
                        <x-badge.statut :statut="$row->statut" />
                    </x-table.cell>
                    <x-table.cell>
                        <x-button.action route="postes.edit" :id="$row->id" icon="pencil-square" color="orange" />
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
        {{ $postes->onEachSide(1)->links('pagination::tailwind') }}
    </nav>
</div>
