<div>
    <div class="hidden mb-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <button wire:click="sortBy('nom')"
                class="flex items-center gap-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                Nom
                @if ($sortBy === 'nom')
                    <x-heroicon-o-arrows-up-down class="size-4" />
                    @if ($sortDirection === 'asc')
                        <x-heroicon-o-arrow-up class="size-4" />
                    @else
                        <x-heroicon-o-arrow-down class="size-4" />
                    @endif
                @endif
            </button>
            <button wire:click="sortBy('prenom')"
                class="flex items-center gap-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                Prénom
                @if ($sortBy === 'prenom')
                    <x-heroicon-o-arrows-up-down class="size-4" />
                    @if ($sortDirection === 'asc')
                        <x-heroicon-o-arrow-up class="size-4" />
                    @else
                        <x-heroicon-o-arrow-down class="size-4" />
                    @endif
                @endif
            </button>
            <button wire:click="sortBy('date')"
                class="flex items-center gap-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                Date
                @if ($sortBy === 'date')
                    <x-heroicon-o-arrows-up-down class="size-4" />
                    @if ($sortDirection === 'asc')
                        <x-heroicon-o-arrow-up class="size-4" />
                    @else
                        <x-heroicon-o-arrow-down class="size-4" />
                    @endif
                @endif
            </button>
        </div>
    </div>

    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto scrollbar-custom sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-lg">
                    @forelse ($documentsAdministratifs as $collaborateurId => $data)
                        @php
                            $collaborateur = $data['collaborateur'];
                            $documents = $data['documents'];
                            $count = $data['count'];
                        @endphp
                        <div x-data="{ open: true }"
                            class="border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                            <div class="bg-blue-300 dark:bg-gray-800 px-4 py-3 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <button @click="open = !open"
                                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                        <x-heroicon-o-chevron-down x-show="open" x-cloak class="size-5" />
                                        <x-heroicon-o-chevron-right x-show="!open" x-cloak class="size-5" />
                                    </button>
                                    <h3 class="text-lg font-semibold text-blue-900 dark:text-gray-100">
                                        {{ $collaborateur->nom . ' ' . $collaborateur->prenom }}
                                    </h3>
                                </div>
                                <span
                                    class="inline-flex items-center rounded-full bg-blue-700 px-2.5 py-0.5 text-xs font-medium text-white dark:bg-blue-900 dark:text-blue-300">
                                    {{ $count }} document{{ $count > 1 ? 's' : '' }}
                                </span>
                            </div>
                            {{-- <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2"> --}}
                            <div x-show="open" x-cloak>
                                <table
                                    class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                                    <x-table.head :headers="[
                                        'Type de document',
                                        'Date d\'émission',
                                        'Date d\'expiration',
                                        'Statut',
                                        '',
                                    ]" />
                                    <tbody
                                        class="divide-y divide-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:divide-gray-700">
                                        @foreach ($documents as $row)
                                            <tr>
                                                <td class="px-5 py-5 text-sm whitespace-wrap text-gray-500">
                                                    <div
                                                        class="flex items-center gap-2 text-gray-900 dark:text-gray-100">
                                                        <x-badge.dot :color="$row->typeDocument->couleur" />
                                                        <span>
                                                            {{ $row->typeDocument->libelle }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 whitespace-nowrap text-gray-500 text-xs">
                                                    <span>{{ \Carbon\Carbon::parse($row->date_emission)->translatedFormat('d F Y') }}</span>
                                                </td>
                                                <td class="px-5 py-5 whitespace-nowrap text-gray-500 text-xs">
                                                    <span>{{ \Carbon\Carbon::parse($row->date_expiration)->translatedFormat('d F Y') }}</span>
                                                </td>
                                                <td class="px-5 py-5 text-sm whitespace-nowrap text-gray-500">
                                                    <x-badge.statut :statut="$row->statut" />
                                                </td>
                                                <td
                                                    class="relative py-5 pr-5 pl-3 text-right text-sm font-medium whitespace-nowrap">
                                                    <div class="inline-flex gap-4">
                                                        <div x-data="{ open: false }">
                                                            {{-- <button x-show="!open" x-cloak @click="open = !open"
                                                                @click.away="open = false"
                                                                class="text-gray-600 dark:text-gray-200 hover:text-blue-600 gap-1 flex items-center">Actions
                                                                <x-heroicon-o-bars-3 class="size-4" />
                                                                <span class="sr-only">Actions</span>
                                                            </button>
                                                            <div x-show="open" @click.away="open = false" x-cloak
                                                                class="flex flex-col items-end gap-2">
                                                                <a href="{{ route('documents-administratifs.edit', $row) }}"
                                                                    class="text-gray-700 dark:text-gray-200 flex items-center gap-1 hover:text-orange-600 dark:hover:text-orange-400"
                                                                    role="menuitem" aria-label="Modifier">
                                                                    Modifier
                                                                    <x-heroicon-o-pencil-square class="size-4" />
                                                                </a>
                                                                <a href="{{ Storage::url($row->document_path) }}" target="_blank"
                                                                    class="text-blue-600 dark:text-blue-400 flex items-center gap-1 hover:text-blue-700 dark:hover:text-blue-500"
                                                                    role="menuitem" aria-label="Voir le document">
                                                                    Voir le document
                                                                    <x-heroicon-o-document class="size-4" />
                                                                </a>
                                                            </div> --}}
                                                            <div class="flex items-end gap-2">

                                                                <a href="{{ Storage::url($row->document_path) }}"
                                                                    target="_blank"
                                                                    class="text-blue-600 dark:text-blue-400 flex items-center gap-1 hover:text-blue-700 dark:hover:text-blue-500"
                                                                    role="menuitem" aria-label="Voir le document">
                                                                    Voir
                                                                    <x-heroicon-o-document class="size-4" />
                                                                </a>
                                                                <a href="{{ route('documents-administratifs.edit', $row) }}"
                                                                    class="text-gray-700 dark:text-gray-200 flex items-center gap-1 hover:text-orange-600 dark:hover:text-orange-400"
                                                                    role="menuitem" aria-label="Modifier">
                                                                    Modifier
                                                                    <x-heroicon-o-chevron-right class="size-4" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                        <div class="px-5 py-5 text-sm text-center text-gray-500">
                            Aucun document administratif disponible.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{-- @if ($documentsAdministratifs->isNotEmpty())
        <nav class="py-6">
            {{ $documentsAdministratifs->links() }}
        </nav>
    @endif --}}
</div>
