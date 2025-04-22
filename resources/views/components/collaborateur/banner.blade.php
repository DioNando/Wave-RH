@props(['collaborateur'])

<aside class="mb-6">
    <div x-data="{ isOpen: false }"
        class="rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
        <!-- Partie supérieure - Informations principales -->
        <div class="relative bg-gradient-to-r from-blue-600 to-blue-300 dark:from-blue-700 dark:to-blue-900 px-6 py-4">
            <div class="flex items-center gap-6">
                <!-- Photo de profil -->
                <div x-data="{ getInitial(nom, prenom) { return nom.charAt(0).toUpperCase() + prenom.charAt(0).toUpperCase(); } }"
                    class="flex-shrink-0 size-24 overflow-hidden bg-white dark:bg-gray-900 rounded-full shadow-lg border-4 border-white dark:border-gray-700 text-gray-700 dark:text-gray-200 text-4xl font-mono flex items-center justify-center">
                    @if ($collaborateur->photo_profil && Storage::disk('public')->exists($collaborateur->photo_profil))
                        <img class="h-full w-full object-cover" src="{{ Storage::url($collaborateur->photo_profil) }}"
                            alt="{{ $collaborateur->nom }}">
                    @else
                        <span x-text="getInitial('{{ $collaborateur->nom }}', '{{ $collaborateur->prenom }}')"></span>
                    @endif
                </div>

                <!-- Informations principales -->
                <div class="flex-auto text-white">
                    <div class="flex flex-wrap items-center gap-3">
                        <h2 class="text-2xl font-bold">
                            {{ $collaborateur->nom . ' ' . $collaborateur->prenom }}
                        </h2>
                        {{-- <x-collaborateur.genre-badge :genre="$collaborateur->genre" :noBg="false" /> --}}
                        <x-badge.statut :statut="$collaborateur->statut" style="badge" />
                    </div>
                    <div class="mt-1 flex items-center gap-2 text-blue-100">
                        <span class="font-medium">{{ $collaborateur->poste_actuel->poste->nom ?? 'Non assigné' }}</span>
                        @if (
                            $collaborateur->poste_actuel &&
                                $collaborateur->poste_actuel->poste &&
                                $collaborateur->poste_actuel->poste->departement)
                            <span>•</span>
                            <span>{{ $collaborateur->poste_actuel->poste->departement->nom }}</span>
                        @endif
                    </div>
                    <div class="mt-1 text-sm text-blue-100">
                        <span>Matricule: {{ $collaborateur->matricule_interne }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contrôle d'accordéon -->
        <div class="border-b border-gray-200 dark:border-gray-700">
            <button @click="isOpen = !isOpen"
                class="flex w-full justify-between items-center px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-sm font-medium text-gray-700 dark:text-gray-200">
                <div class="flex items-center gap-2">
                    <x-heroicon-o-information-circle class="size-5 text-gray-500 dark:text-gray-400" />
                    <span>Informations détaillées</span>
                </div>
                <div>
                    <x-heroicon-o-chevron-up x-show="isOpen"
                        class="size-5 text-gray-500 dark:text-gray-400 transition-transform duration-200" />
                    <x-heroicon-o-chevron-down x-show="!isOpen"
                        class="size-5 text-gray-500 dark:text-gray-400 transition-transform duration-200"
                        style="display: none;" />
                </div>
            </button>
        </div>

        <!-- Partie centrale - Coordonnées et détails -->
        <div x-show="isOpen" x-cloak class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6" x-cloak>
            <!-- Colonne 1: Coordonnées -->
            <div class="space-y-4">
                <h3 class="font-medium text-gray-900 dark:text-gray-100">Coordonnées</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-x-3">
                        <x-heroicon-o-envelope class="size-5 text-gray-400" />
                        <span
                            class="text-sm text-gray-700 dark:text-gray-200">{{ $collaborateur->email_professionnel }}</span>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <x-heroicon-o-phone class="size-5 text-gray-400" />
                        <span
                            class="text-sm text-gray-700 dark:text-gray-200">{{ $collaborateur->telephone_professionnel }}</span>
                    </div>
                    @if (isset($collaborateur->ville))
                        <div class="flex items-center gap-x-3">
                            <x-heroicon-o-map-pin class="size-5 text-gray-400" />
                            <div class="text-sm">
                                <span class="text-gray-700 dark:text-gray-200">{{ $collaborateur->ville->nom }}</span>
                                <span
                                    class="text-gray-500 dark:text-gray-400 text-xs block">{{ $collaborateur->ville->pays->nom }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Colonne 2: Informations professionnelles -->
            <div class="space-y-4">
                <h3 class="font-medium text-gray-900 dark:text-gray-100">Informations professionnelles</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-x-3">
                        <x-heroicon-o-calendar class="size-5 text-gray-400" />
                        <div class="text-sm">
                            <span class="text-gray-700 dark:text-gray-200">Embauché le
                                {{ \Carbon\Carbon::parse($collaborateur->date_embauche)->translatedFormat('d F Y') }}</span>
                            <span
                                class="text-gray-500 dark:text-gray-400 text-xs block">{{ \Carbon\Carbon::parse($collaborateur->date_embauche)->diffForHumans() }}</span>
                        </div>
                    </div>
                    @if ($collaborateur->informations_bancaires && count($collaborateur->informations_bancaires) > 0)
                        <div class="flex items-start gap-x-3">
                            <x-heroicon-o-credit-card class="size-5 text-gray-400 mt-0.5" />
                            <div class="text-sm">
                                <span class="text-gray-700 dark:text-gray-200">Informations bancaires</span>
                                @foreach ($collaborateur->informations_bancaires as $info)
                                    <span class="text-gray-500 dark:text-gray-400 text-xs block">IBAN:
                                        {{ $info->iban }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Colonne 3: Informations système -->
            <div class="space-y-4">
                <h3 class="font-medium text-gray-900 dark:text-gray-100">Informations système</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-x-3">
                        <x-heroicon-o-plus-circle class="size-5 text-gray-400" />
                        <div class="text-sm">
                            <span class="text-gray-700 dark:text-gray-200">Créé
                                {{ $collaborateur->created_at->diffForHumans() }}</span>
                            <span class="text-gray-500 dark:text-gray-400 text-xs block">
                                par {{ $collaborateur->user->nom . ' ' . $collaborateur->user->prenom }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <x-heroicon-o-pencil class="size-5 text-gray-400" />
                        <div class="text-sm">
                            <span class="text-gray-700 dark:text-gray-200">Modifié
                                {{ $collaborateur->updated_at->diffForHumans() }}</span>
                            <span class="text-gray-500 dark:text-gray-400 text-xs block">
                                par {{ $collaborateur->user->nom . ' ' . $collaborateur->user->prenom }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barre d'actions -->
        <div
            class="bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 px-6 py-4 flex flex-wrap gap-3 justify-end">
            <!-- Actions principales -->
            <div class="flex gap-3 items-center">
                <div x-data="{ open: false }" class="hidden relative flex items-center">
                    <!-- Bouton pour développer/réduire -->
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center rounded-md px-3 py-2 text-sm font-medium transition-colors border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2">
                        <span x-text="open ? 'Moins d\'actions' : 'Plus d\'actions'" class="mr-2"></span>
                        <x-heroicon-o-chevron-right x-show="open" class="size-4" style="display: none;" />
                        <x-heroicon-o-chevron-left x-show="!open" class="size-4" />
                    </button>

                    <!-- Actions secondaires qui apparaissent à droite -->
                    <div x-show="open"x-cloak class="flex gap-3 ml-3" style="display: none;">
                        <a href="#">
                            <x-button.outlined color="gray" responsive icon="heroicon-o-arrow-down-tray">
                                Télécharger
                            </x-button.outlined>
                        </a>

                        {{-- @livewire('base.delete', [
                            'modelId' => $collaborateur->id,
                            'modelType' => 'collaborateur',
                            'redirectRoute' => 'collaborateurs',
                            'redirectType' => 'index',
                            'entity' => $collaborateur,
                            'buttonLabel' => 'Supprimer',
                            'title' => 'Supprimer le collaborateur ' . $collaborateur->nom . ' ' . $collaborateur->prenom . ' ?',
                            'body' => 'Êtes-vous sûr de vouloir supprimer ce collaborateur ? Cette action est irréversible.',
                        ])

                        <form action="{{ route('collaborateurs.toggle-status', $collaborateur) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('PUT')
                            <x-button.outlined type="submit" :color="$collaborateur->statut ? 'gray' : 'green'" :icon="$collaborateur->statut ? 'heroicon-o-arrow-down' : 'heroicon-o-arrow-up'">
                                {{ $collaborateur->statut ? 'Désactiver' : 'Activer' }}
                            </x-button.outlined>
                        </form> --}}
                    </div>
                </div>

                <!-- Actions principales toujours visibles -->
                {{-- <x-form.form action="{{ route('collaborateurs.contact', $collaborateur) }}" method="POST">
                    <x-button.primary type="submit" responsive icon="heroicon-o-paper-airplane">
                        Contacter
                    </x-button.primary>
                </x-form.form> --}}

                <a href="{{ route('collaborateurs.edit', $collaborateur) }}">
                    <x-button.primary type="button" color="orange" responsive icon="heroicon-o-pencil-square">
                        Modifier
                    </x-button.primary>
                </a>
            </div>
        </div>
    </div>
</aside>
