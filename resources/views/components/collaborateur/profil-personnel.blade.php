@props(['collaborateur'])

<section x-show="activeTab === 'profil-personnel'" x-cloak class="space-y-4">
    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Informations personnelles" type="primary" />
        <x-card.card-body divider>
            <x-card.card-row label="Nom" value="{{ $collaborateur->nom }}" />
            <x-card.card-row label="Prénom" value="{{ $collaborateur->prenom }}" />
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium text-gray-900 dark:text-white">Genre</dt>
                <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0"> <x-badge.collaborateur-genre
                        :value="$collaborateur->genre" />
                </dd>
            </div>
            <x-card.card-row label="Date de naissance"
                value="{{ \Carbon\Carbon::parse($collaborateur->date_naissance)->translatedFormat('d F Y') }}" />
            <x-card.card-row label="Age"
                value="{{ \Carbon\Carbon::parse($collaborateur->date_naissance)->age . ' ans' }}" />
            <x-card.card-row label="Lieu de naissance" value="{{ $collaborateur->lieu_naissance->nom }}" />
            <x-card.card-row label="Pays de naissance" value="{{ $collaborateur->pays->nom }}" />
            <x-card.card-row label="Situation marital" value="{{ $collaborateur->statut_marital->label() }}" />
            <x-card.card-row label="Nombres d'enfants" value="{{ $collaborateur->nombre_enfants }}" />
            <x-card.card-row label="CIN" value="{{ $collaborateur->cin }}" />
            <x-card.card-row label="CNSS" value="{{ $collaborateur->cnss }}" />
        </x-card.card-body>
    </x-card>

    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Coordonnées" type="primary" />
        <x-card.card-body divider>
            <x-card.card-row label="Email professionnel" value="{{ $collaborateur->email_professionnel }}" />
            <x-card.card-row label="Téléphone professionnel" value="{{ $collaborateur->telephone_professionnel }}" />
            <x-card.card-row label="Email personnel" value="{{ $collaborateur->email_personnel }}" />
            <x-card.card-row label="Téléphone personnel" value="{{ $collaborateur->telephone_personnel }}" />
            <x-card.card-row label="Adresse complète" value="{{ $collaborateur->adresse_complete }}" />
            <x-card.card-row label="Ville" value="{{ $collaborateur->ville->nom }}" />
            <x-card.card-row label="Région" value="{{ $collaborateur->ville->region->nom }}" />
            <x-card.card-row label="Pays" value="{{ $collaborateur->ville->pays->nom }}" />
        </x-card.card-body>
    </x-card>

    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Contacts d'urgences" type="primary" />
        <x-card.card-body>
            <div class="mb-6">
                @livewire('collaborateurs.contacts-urgences.create', ['collaborateur' => $collaborateur])
            </div>
            <div>
                @php
                    $headers = ['Nom', 'Relation', 'Téléphone', 'Email', 'Adresse complète', 'Ville', 'Statut'];
                    $empty = 'Aucun contact d\'urgence disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :headers="$headers" :background="false" />
                    <x-table.body>
                        @forelse ($collaborateur->contact_urgences as $row)
                            <tr>
                                <x-table.cell content="{{ $row->nom }}" />
                                <x-table.cell content="{{ $row->relation }}" />
                                <x-table.cell content="{{ $row->telephone }}" />
                                <x-table.cell content="{{ $row->email }}" />
                                <x-table.cell content="{{ $row->adresse_complete }}" />
                                <x-table.cell content="{{ $row->ville->nom }}" />
                                <x-table.cell>
                                    <x-badge.statut :statut="$row->statut" />
                                </x-table.cell>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($headers) }}"
                                    class="text-center py-5 text-gray-500 dark:text-gray-400">
                                    {{ $empty }}
                                </td>
                            </tr>
                        @endforelse
                    </x-table.body>
                </table>
            </div>
        </x-card.card-body>
    </x-card>
</section>
