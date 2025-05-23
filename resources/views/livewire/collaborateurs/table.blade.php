@php
    $empty = 'Aucun collaborateur trouvé';
@endphp

<div x-data="usersTable()">
    <template x-if="selectedUsers.length > 0">
        <div
            class="p-6 mb-5 overflow-hidden text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-900 ring ring-gray-200 dark:ring-gray-700 rounded-lg flex flex-wrap gap-3 justify-end items-center">
            <span class="text-sm text-gray-600 dark:text-gray-300"
                x-text="`${selectedUsers.length} collaborateur(s) sélectionné(s)`"></span>
            <form id="form-activate" action="{{ route('collaborateurs.update-statut') }}" method="POST">
                @csrf
                <input type="hidden" name="ids" x-bind:value="JSON.stringify(selectedUsers)">
                <input type="hidden" name="statut" value="1">
                <x-button.outlined type="submit" color="green" responsive icon="heroicon-o-check">
                    Activer <span class="ml-1" x-text="'('+selectedUsers.length+')'"></span>
                </x-button.outlined>
            </form>
            <form id="form-deactivate" action="{{ route('collaborateurs.update-statut') }}" method="POST">
                @csrf
                <input type="hidden" name="ids" x-bind:value="JSON.stringify(selectedUsers)">
                <input type="hidden" name="statut" value="0">
                <x-button.outlined type="submit" color="red" responsive icon="heroicon-o-x-mark">
                    Désactiver <span class="ml-1" x-text="'('+selectedUsers.length+')'"></span>
                </x-button.outlined>
            </form>
        </div>
    </template>
    <x-table>
        <x-table.head>
            <th>
                <div class="flex justify-center">
                    <input type="checkbox" id="select-all-users" class="checkbox-custom" x-data
                        x-on:click="toggleAll($event)">
                </div>
            </th>
            @foreach ($headers as $header)
                <x-table.head-cell :content="$header['content']" :align="$header['align']" />
            @endforeach
        </x-table.head>
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse ($collaborateurs as $collaborateur)
                <tr
                    x-bind:class="{ 'bg-blue-50 dark:bg-blue-900/20': selectedUsers.includes({{ $collaborateur->id }}) }">
                    <td class="px-4">
                        <div class="flex justify-center">
                            <input type="checkbox" value="{{ $collaborateur->id }}"
                                class="user-checkbox checkbox-custom" x-data
                                x-on:click="toggleUser({{ $collaborateur->id }})">
                        </div>
                    </td>
                    <x-table.cell class="w-0 pl-0 pr-0">
                        <div x-data="{ getInitial(nom, prenom) { return nom.charAt(0).toUpperCase() + prenom.charAt(0).toUpperCase(); } }"
                            class="relative size-11 overflow-hidden bg-gray-400 dark:bg-gray-700 rounded-full text-gray-100 dark:text-gray-200 text-lg font-mono flex items-center justify-center">
                            @if ($collaborateur->photo_profil && Storage::disk('public')->exists($collaborateur->photo_profil))
                                <img class="h-full w-full object-cover"
                                    src="{{ Storage::url($collaborateur->photo_profil) }}"
                                    alt="{{ $collaborateur->nom }}">
                            @else
                                <span
                                    x-text="getInitial('{{ $collaborateur->nom }}', '{{ $collaborateur->prenom }}')"></span>
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
                    @if (in_array('poste', $visibleColumns))
                        <x-table.cell>
                            <div class="text-gray-600 dark:text-gray-200">
                                {{ $collaborateur->historique_postes->first()?->poste?->nom ?? 'Non assigné' }}
                            </div>
                            <div class="mt-1 text-xs text-gray-500">
                                {{ $collaborateur->historique_postes->first()?->poste?->departement?->nom ?? 'Non assigné' }}
                            </div>
                        </x-table.cell>
                    @endif
                    @if (in_array('matricule_interne', $visibleColumns))
                        <x-table.cell class="text-gray-500">
                            <div class="text-gray-600 dark:text-gray-200 font-mono">
                                {{ $collaborateur->matricule_interne }}</div>
                        </x-table.cell>
                    @endif
                    @if (in_array('information_bancaires', $visibleColumns))
                        <x-table.cell>
                            <div class="flex flex-col gap-1">
                                @forelse ($collaborateur->information_bancaires as $info)
                                    <span class="text-gray-500 text-xs font-mono">
                                        IBAN : {{ $info->iban }}
                                    </span>
                                @empty
                                    <div class="text-gray-500 text-xs ">
                                        Aucune information bancaire
                                    </div>
                                @endforelse
                            </div>
                        </x-table.cell>
                    @endif
                    @if (in_array('contact', $visibleColumns))
                        <x-table.cell class="text-gray-500">
                            <div class="text-gray-900 dark:text-gray-100">
                                {{ $collaborateur->email_professionnel }}
                            </div>
                            <div class="mt-1 text-gray-500">
                                {{ $collaborateur->telephone_professionnel }}
                            </div>
                        </x-table.cell>
                    @endif
                    @if (in_array('ville', $visibleColumns))
                        <x-table.cell class="text-gray-500">
                            <div class="text-gray-600 dark:text-gray-200">
                                {{ $collaborateur->ville->nom }}
                            </div>
                            <div class="mt-1 text-xs text-gray-500">
                                {{ $collaborateur->ville->pays->nom }}
                            </div>
                        </x-table.cell>
                    @endif
                    @if (in_array('date_embauche', $visibleColumns))
                        <x-table.cell>
                            <div class="flex flex-col">
                                <span class="text-gray-500 text-xs ">
                                    {{ \Carbon\Carbon::parse($collaborateur->date_embauche)->translatedFormat('d F Y') }}

                                </span>
                                <span class="text-gray-500 text-xs ">
                                    {{ \Carbon\Carbon::parse($collaborateur->date_embauche)->diffForHumans() }}

                                </span>
                            </div>
                        </x-table.cell>
                    @endif
                    @if (in_array('created_at', $visibleColumns))
                        <x-table.cell>
                            <div class="flex flex-col">
                                <span class="text-gray-500 text-xs ">
                                    {{ $collaborateur->created_at->diffForHumans() }}
                                </span>
                                <span class="text-gray-500 text-xs ">
                                    par
                                    {{ $collaborateur->user->nom . ' ' . $collaborateur->user->prenom }}
                                </span>
                            </div>
                        </x-table.cell>
                    @endif
                    @if (in_array('updated_at', $visibleColumns))
                        <x-table.cell>
                            <div class="flex flex-col">
                                <span class="text-gray-500 text-xs ">
                                    {{ $collaborateur->updated_at->diffForHumans() }}
                                </span>
                                <span class="text-gray-500 text-xs ">
                                    par
                                    {{ $collaborateur->user->nom . ' ' . $collaborateur->user->prenom }}
                                </span>
                            </div>
                        </x-table.cell>
                    @endif
                    <x-table.cell align="center">
                        <x-badge.statut :statut="$collaborateur->statut" style="badge" />
                    </x-table.cell>
                    <x-table.cell>
                        <div class="flex gap-1 items-center justify-end">
                            <x-button.action simple="true" route="collaborateurs.show" :id="$collaborateur->id" icon="eye"
                                color="blue">Consulter</x-button.action>
                            <x-label.divide-vertical />
                            <x-button.action simple="true" route="collaborateurs.edit" :id="$collaborateur->id"
                                icon="pencil-square" color="orange">Editer</x-button.action>
                        </div>
                    </x-table.cell>
                </tr>
            @empty
                <td colspan="{{ count($headers) + 2 }}" class="text-center py-5 text-gray-500 dark:text-gray-400">
                    {{ $empty }}
                </td>
            @endforelse
        </x-table.body>
    </x-table>
    <nav class="mt-3">
        {{ $collaborateurs->onEachSide(1)->links('pagination::tailwind') }}
    </nav>

    @push('scripts')
        <script>
            function usersTable() {
                return {
                    selectedUsers: [],
                    init() {
                        // Ajouter des confirmations avant de soumettre les formulaires
                        document.getElementById('form-activate')?.addEventListener('submit', (e) => {
                            if (!confirm(
                                `Voulez-vous vraiment activer ${this.selectedUsers.length} collaborateur(s) ?`)) {
                                e.preventDefault();
                            }
                        });

                        document.getElementById('form-deactivate')?.addEventListener('submit', (e) => {
                            if (!confirm(
                                    `Voulez-vous vraiment désactiver ${this.selectedUsers.length} collaborateur(s) ?`
                                    )) {
                                e.preventDefault();
                            }
                        });
                    },
                    toggleAll(event) {
                        const checkboxes = document.querySelectorAll('.user-checkbox');
                        const isChecked = event.target.checked;

                        // Vider ou remplir la liste des utilisateurs sélectionnés
                        this.selectedUsers = [];

                        if (isChecked) {
                            // Sélectionner tous les utilisateurs
                            checkboxes.forEach(checkbox => {
                                checkbox.checked = true;
                                this.selectedUsers.push(parseInt(checkbox.value));
                            });
                        } else {
                            // Désélectionner tous les utilisateurs
                            checkboxes.forEach(checkbox => {
                                checkbox.checked = false;
                            });
                        }
                    },
                    toggleUser(userId) {
                        const index = this.selectedUsers.indexOf(userId);

                        if (index === -1) {
                            // Ajouter à la liste des sélectionnés
                            this.selectedUsers.push(userId);
                        } else {
                            // Retirer de la liste des sélectionnés
                            this.selectedUsers.splice(index, 1);
                        }

                        // Mettre à jour la case "Select All"
                        const checkboxes = document.querySelectorAll('.user-checkbox');
                        const selectAllCheckbox = document.getElementById('select-all-users');
                        selectAllCheckbox.checked = this.selectedUsers.length === checkboxes.length;
                    }
                }
            }
        </script>
    @endpush
</div>
