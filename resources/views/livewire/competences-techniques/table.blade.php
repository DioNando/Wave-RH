@php
    $headers = [
        ['content' => 'Nom', 'align' => 'text-left'],
        ['content' => 'Catégorie', 'align' => 'text-left'],
        ['content' => 'Description', 'align' => 'text-left'],
        ['content' => '', 'align' => 'text-right'],
    ];
    $empty = 'Aucune compétence technique trouvée';
@endphp

<div>
    <div class="mb-4">
        <div class="flex flex-wrap items-center gap-4">
            <div class="w-full sm:w-auto">
                <label for="categorieFilter" class="sr-only">Filtrer par catégorie</label>
                <select wire:model.live="categorieFilter" id="categorieFilter"
                    class="w-full rounded-md dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-sm">
                    <option value="">Toutes les catégories</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie }}">{{ $categorie }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <x-table.table :headers="$headers">
        <x-table.head>
            @foreach ($headers as $header)
                <x-table.head-cell :content="$header['content']" :align="$header['align']" />
            @endforeach
        </x-table.head>
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($competencesTechniques as $row)
                <tr>
                    <x-table.cell class="font-medium" :content="$row->nom" />
                    <x-table.cell :content="$row->categorie" />
                    <x-table.cell>
                        <div class="flex items-center">
                            <span
                                class="truncate max-w-[200px] text-gray-700 dark:text-gray-400">{{ $row->description }}</span>
                        </div>
                    </x-table.cell>
                    <x-table.cell align="right">
                        <x-button.action simple="true" href="{{ route('competences-techniques.edit', $row->id) }}"
                            icon="pencil-square" color="orange">Editer</x-button.action>
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
        {{ $competencesTechniques->onEachSide(1)->links('pagination::tailwind') }}
    </nav>
</div>
