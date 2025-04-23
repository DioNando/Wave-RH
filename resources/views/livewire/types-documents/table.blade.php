@php
    $headers = ['Libellé', 'Description', 'Statut', ''];
    $empty = 'Aucun type de document trouvé';
@endphp

<div>
    <x-table.table :headers="$headers">
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($typesDocuments as $row)
                <tr>
                    <x-table.cell>
                        <div class="flex items-center gap-2 font-medium">
                            <x-badge.dot :color="$row->couleur" />
                            <span>{{ $row->libelle }}</span>
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="flex items-center">
                            <span
                                class="truncate max-w-[250px] text-gray-700 dark:text-gray-400">{{ $row->description }}</span>
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <x-badge.statut :statut="$row->statut" />
                    </x-table.cell>
                    <x-table.cell align="right">
                        <x-button.action simple="true" href="{{ route('types-documents.edit', $row) }}" icon="pencil-square"
                            color="orange" >Editer</x-button.action>
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
        {{ $typesDocuments->onEachSide(1)->links('pagination::tailwind') }}
    </nav>
</div>
