@props(['collaborateurs'])

<div class="lg:grid lg:grid-cols-12 lg:gap-x-16">
    <ol class="mt-4  text-sm/6 lg:col-span-7 xl:col-span-full">
        @forelse ($collaborateurs as $collaborateur)
            <li x-data="{
                showDetails: false,
                getInitial(nom) { return nom.charAt(0).toUpperCase(); }
            }"
                class="relative flex gap-x-6 p-6 xl:static bg-white dark:bg-gray-900 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg mb-2">
                <div class="relative">
                    <div
                        class="size-14 overflow-hidden bg-gray-400 dark:bg-gray-700 rounded-full text-gray-100 dark:text-gray-200 text-2xl flex items-center justify-center ring-1 ring-white dark:ring-gray-800">
                        @if ($collaborateur->photo_profil && Storage::disk('public')->exists($collaborateur->photo_profil))
                            <img class="h-full w-full object-cover" src="{{ Storage::url($collaborateur->photo_profil) }}"
                                alt="{{ $collaborateur->nom }}">
                        @else
                            <span x-text="getInitial('{{ $collaborateur->prenom }}')"></span>
                        @endif
                    </div>
                </div>
                <div x-data @click="window.location.href='{{ route('collaborateurs.show', $collaborateur) }}'"
                    class="flex-auto cursor-pointer">
                    <div class="flex items-end justify-between">
                        <div class="flex flex-wrap gap-2">
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $collaborateur->nom . ' ' . $collaborateur->prenom }}
                            </span>
                            <span class="text-gray-500">
                                {{ $collaborateur->historique_postes()->latest()->first()?->poste->nom ?? 'Non assigné' }}
                            </span>
                        </div>

                        {{-- <x-notification.statut-badge statut="{{ $collaborateur->statut }}" /> --}}
                    </div>
                    <dl class="mt-3 flex flex-col text-gray-500 dark:text-gray-400 xl:flex-row">
                        <div class="flex items-start gap-x-3">
                            <dt class="mt-0.5">
                                <span class="sr-only">Téléphone</span>
                                <x-heroicon-o-phone class="size-5 text-gray-400" />
                            </dt>
                            <dd>
                                {{ $collaborateur->telephone_professionnel ?? 'Non renseigné' }}
                            </dd>
                        </div>
                        <div
                            class="mt-2 flex items-start gap-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400/50 xl:pl-3.5">
                            <dt class="mt-0.5">
                                <span class="sr-only">Location</span>
                                <x-heroicon-o-map-pin class="size-5 text-gray-400" />
                            </dt>
                            <dd>{{ $collaborateur->ville->nom . ', ' . $collaborateur->ville->pays->nom }}</dd>
                        </div>
                        <div
                            class="mt-2 flex items-start gap-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400/50 xl:pl-3.5">
                            <dt class="mt-0.5">
                                <span class="sr-only">Email</span>
                                <x-heroicon-o-envelope class="size-5 text-gray-400" />
                            </dt>
                            <dd class="truncate">{{ $collaborateur->email_professionnel }}</dd>
                        </div>
                    </dl>
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach ($collaborateur->competencesTechniques as $competence)
                            <x-badge.item :text="$competence->nom" color="blue" />
                        @endforeach
                    </div>
                </div>
            </li>
        @empty
            <li class="py-6 text-center text-gray-500">
                <div class="flex flex-col items-center justify-center">
                    <x-heroicon-o-user-group class="size-12 text-gray-400 mb-2" />
                    <p>La liste des collaborateurs est pour le moment vide.</p>
                </div>
            </li>
        @endforelse
    </ol>
</div>
