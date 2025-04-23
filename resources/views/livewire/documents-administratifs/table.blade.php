<div class="mt-5 outline-1 outline-gray-200 dark:outline-gray-700 rounded-lg overflow-hidden">
    @forelse ($documentsAdministratifs as $collaborateurId => $data)
        @php
            $collaborateur = $data['collaborateur'];
            $documents = $data['documents'];
            $count = $data['count'];
        @endphp
        <div x-data="{ open: true }" class="border-b border-gray-200 dark:border-gray-700 last:border-b-0">
            <div class="bg-blue-300 dark:bg-blue-900 px-4 py-3 flex items-center justify-between">
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
                <x-badge.item text="{{ $count }} document{{ $count > 1 ? 's' : '' }}" color="blue" />
            </div>
            <div x-show="open" x-cloak>
                {{-- TABLE CONTENT --}}
                @php
                    $headers = ['Type de document', 'Date d\'émission', 'Date d\'expiration', 'Statut', ''];
                    $empty = 'Aucun document trouvé';
                @endphp
                <div class="overflow-auto scrollbar-custom">
                    <table class="w-full overflow-hidden">
                        <x-table.head :headers="$headers" />
                        <x-table.body class="bg-white dark:bg-gray-900">
                            @foreach ($documents as $row)
                                <tr>
                                    <x-table.cell>
                                        <div class="flex items-center gap-2 text-gray-900 dark:text-gray-100">
                                            <x-badge.dot :color="$row->typeDocument->couleur" />
                                            <span>
                                                {{ $row->typeDocument->libelle }}
                                            </span>
                                        </div>
                                    </x-table.cell>
                                    @if ($row->date_emission)
                                        <x-table.cell>
                                            <div class="flex flex-col">
                                                <span>
                                                    {{ \Carbon\Carbon::parse($row->date_emission)->translatedFormat('d F Y') }}
                                                </span>
                                                <span
                                                    class="text-xs text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($row->date_emission)->diffForHumans() }}
                                                </span>
                                            </div>
                                        </x-table.cell>
                                    @else
                                        <x-table.cell />
                                    @endif
                                    <x-table.cell>
                                        <div class="flex flex-col">
                                            <span>{{ \Carbon\Carbon::parse($row->date_expiration)->translatedFormat('d F Y') }}</span>
                                            @php
                                                $daysLeft = round(
                                                    now()->diffInDays(
                                                        \Carbon\Carbon::parse($row->date_expiration),
                                                        false,
                                                    ),
                                                );
                                                $textColor =
                                                    $daysLeft < 0
                                                        ? 'text-red-500'
                                                        : ($daysLeft < 30
                                                            ? 'text-amber-500'
                                                            : 'text-green-500');
                                            @endphp
                                            <span class="text-xs {{ $textColor }}">
                                                @if ($daysLeft < 0)
                                                    Expiré depuis {{ abs($daysLeft) }} jour(s)
                                                @else
                                                    Expire dans {{ $daysLeft }} jour(s)
                                                @endif
                                            </span>
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <x-badge.statut :statut="$row->statut" />
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="flex gap-1 items-center justify-end">
                                            <x-button.action simple="true" target="_blank"
                                                href="{{ Storage::url($row->document_path) }}" icon="document"
                                                color="blue">Voir</x-button.action>
                                            <x-label.divide-vertical />
                                            <x-button.action simple="true"
                                                href="{{ route('documents-administratifs.edit', $row->id) }}"
                                                icon="pencil-square" color="orange">Editer</x-button.action>
                                        </div>
                                    </x-table.cell>
                                </tr>
                            @endforeach
                        </x-table.body>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <div class="px-5 py-5 text-sm text-center text-gray-500">
            Aucun document administratif disponible.
        </div>
    @endforelse
</div>
