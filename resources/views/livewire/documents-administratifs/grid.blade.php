<div>
    <div class="hidden mb-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <button wire:click="sortBy('nom')" class="flex items-center gap-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                Nom
                @if($sortBy === 'nom')
                    <x-heroicon-o-arrows-up-down class="size-4" />
                    @if($sortDirection === 'asc')
                        <x-heroicon-o-arrow-up class="size-4" />
                    @else
                        <x-heroicon-o-arrow-down class="size-4" />
                    @endif
                @endif
            </button>
            <button wire:click="sortBy('prenom')" class="flex items-center gap-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                Prénom
                @if($sortBy === 'prenom')
                    <x-heroicon-o-arrows-up-down class="size-4" />
                    @if($sortDirection === 'asc')
                        <x-heroicon-o-arrow-up class="size-4" />
                    @else
                        <x-heroicon-o-arrow-down class="size-4" />
                    @endif
                @endif
            </button>
            <button wire:click="sortBy('date')" class="flex items-center gap-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                Date
                @if($sortBy === 'date')
                    <x-heroicon-o-arrows-up-down class="size-4" />
                    @if($sortDirection === 'asc')
                        <x-heroicon-o-arrow-up class="size-4" />
                    @else
                        <x-heroicon-o-arrow-down class="size-4" />
                    @endif
                @endif
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($documentsAdministratifs as $collaborateurId => $data)
            @php
                $collaborateur = $data['collaborateur'];
                $documents = $data['documents'];
                $count = $data['count'];
            @endphp
            <div x-data="{ open: true }" class="bg-white dark:bg-gray-900 outline-1 outline-gray-200 dark:outline-gray-700 rounded-lg overflow-hidden">
                <div class="bg-blue-200 dark:bg-gray-800 px-4 py-3 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button @click="open = !open" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <x-heroicon-o-chevron-down x-show="open" x-cloak class="size-5" />
                            <x-heroicon-o-chevron-right x-show="!open" x-cloak class="size-5" />
                        </button>
                        <h3 class="text-lg font-semibold text-blue-900 dark:text-gray-100">
                            {{ $collaborateur->nom . ' ' . $collaborateur->prenom }}
                        </h3>
                    </div>
                    <span class="flex-shrink-0 inline-flex items-center rounded-full bg-blue-700 px-2.5 py-0.5 text-xs font-medium text-white dark:bg-blue-900 dark:text-blue-300">
                        {{ $count }} document{{ $count > 1 ? 's' : '' }}
                    </span>
                </div>

                <div x-show="open" x-cloak class="p-4">
                    <div class="space-y-4">
                        @foreach ($documents as $row)
                            <div class="flex items-start justify-between p-3 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                                <div class="flex items-start gap-3">
                                    <x-badge.dot :color="$row->typeDocument->couleur" size="lg" />
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $row->typeDocument->libelle }}
                                        </h4>
                                        <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            <div>Émis le : {{ \Carbon\Carbon::parse($row->date_emission)->translatedFormat('d F Y') }}</div>
                                            <div>Expire le : {{ \Carbon\Carbon::parse($row->date_expiration)->translatedFormat('d F Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open" @click.away="open = false"
                                        class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400">
                                        <x-heroicon-o-ellipsis-vertical class="size-5" />
                                    </button>
                                    <div x-show="open" @click.away="open = false" x-cloak
                                        class="absolute right-0 z-10 mt-2 w-56 origin-top-right overflow-hidden rounded-md shadow-md bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 focus:outline-none">
                                        <a href="{{ route('documents-administratifs.edit', $row) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Modifier
                                        </a>
                                        <a href="{{ Storage::url($row->document_path) }}" target="_blank"
                                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Voir le document
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500 dark:text-gray-400">
                Aucun document administratif disponible.
            </div>
        @endforelse
    </div>
</div>
