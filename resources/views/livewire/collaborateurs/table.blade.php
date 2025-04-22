@php
    $empty = 'Aucun collaborateur trouvé';
@endphp

<div>
    <x-table :headers="['', ...$headers, '']">
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($collaborateurs as $collaborateur)
                <tr>
                    <x-table.cell class="w-0 pr-0">
                        <div x-data="{ getInitial(nom, prenom) { return nom.charAt(0).toUpperCase() + prenom.charAt(0).toUpperCase() ; } }"
                            class="relative size-11 overflow-hidden bg-gray-400 dark:bg-gray-700 rounded-full text-gray-100 dark:text-gray-200 text-lg font-mono flex items-center justify-center">
                            @if ($collaborateur->photo_profil && Storage::disk('public')->exists($collaborateur->photo_profil))
                                <img class="h-full w-full object-cover"
                                    src="{{ Storage::url($collaborateur->photo_profil) }}"
                                    alt="{{ $collaborateur->nom }}">
                            @else
                                <span x-text="getInitial('{{ $collaborateur->nom }}', '{{ $collaborateur->prenom }}')"></span>
                            @endif
                        </div>
                    </x-table.cell>
                    @if (in_array('nom', $visibleColumns))
                        <x-table.cell>
                            <div x-data x-data
                                @click="window.location.href='{{ route('collaborateurs.show', $collaborateur) }}'"
                                class="cursor-pointer">
                                <div class="font-medium text-gray-900 dark:text-gray-100 hover:text-blue-600">
                                    {{ $collaborateur->nom . ' ' . $collaborateur->prenom }}</div>
                                <x-badge.collaborateur-genre :value="$collaborateur->genre" />

                            </div>
                        </x-table.cell>
                    @endif
                    @if (in_array('contact', $visibleColumns))
                        <td class="px-5 py-5 text-sm whitespace-nowrap text-gray-500">
                            <div class="text-gray-900 dark:text-gray-100">
                                {{ $collaborateur->email_professionnel }}
                            </div>
                            <div class="mt-1 text-gray-500">
                                {{ $collaborateur->telephone_professionnel }}
                            </div>
                        </td>
                    @endif
                    @if (in_array('ville', $visibleColumns))
                        <td class="px-5 py-5 text-sm whitespace-nowrap">
                            <div class="text-gray-600 dark:text-gray-200">
                                {{ $collaborateur->ville->nom }}
                            </div>
                            <div class="mt-1 text-xs text-gray-500">
                                {{ $collaborateur->ville->pays->nom }}
                            </div>
                        </td>
                    @endif
                    <x-table.cell>
                        <x-badge.statut :statut="$collaborateur->statut" style="badge" />
                    </x-table.cell>
                    {{-- <x-table.cell>
                        <x-button.action route="departements.edit" :id="$row->id" icon="pencil-square" color="orange" />
                    </x-table.cell> --}}
                    <x-table.cell>
                        <div class="space-x-1">
                            <x-button.action route="collaborateurs.show" :id="$collaborateur->id" icon="eye"
                                color="blue" />
                            <x-button.action route="collaborateurs.edit" :id="$collaborateur->id" icon="pencil-square"
                                color="orange" />
                        </div>
                    </x-table.cell>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) + 2 }}" class="text-center py-5 text-gray-500 dark:text-gray-400">
                        {{ $empty }}
                    </td>
                </tr>
            @endforelse
        </x-table.body>
    </x-table>
    <nav class="mt-3">
        {{ $collaborateurs->onEachSide(1)->links('pagination::tailwind') }}
    </nav>
</div>
