@props(['collaborateur'])

<section x-show="activeTab === 'profil-professionnel'" x-cloak class="space-y-4">
    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Informations professionnelles" type="primary" />
        <x-card.card-body divider>
            <x-card.card-row label="Poste actuel" value="{{ $collaborateur->poste_actuel->poste->nom ?? '' }}" />
            <x-card.card-row label="Département"
                value="{{ $collaborateur->poste_actuel->poste->departement->nom ?? '' }}" />
            <x-card.card-row label="Matricule" value="{{ $collaborateur->matricule_interne }}" />
            <x-card.card-row label="Date d'embauche"
                value="{{ \Carbon\Carbon::parse($collaborateur->date_embauche)->translatedFormat('d F Y') }}" />
        </x-card.card-body>
    </x-card>

    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Compétences et qualifications" type="primary" />
        <x-card.card-body divider>
            <x-card.badge-list label="Langues" :items="$collaborateur->langues ? json_decode($collaborateur->langues) : []" color="yellow" emptyText="Aucune langue spécifiée" />
            <x-card.badge-list label="Compétences techniques" :items="$collaborateur->competences_techniques
                ? json_decode($collaborateur->competences_techniques)
                : []" color="indigo"
                emptyText="Aucune compétence technique spécifiée" />
        </x-card.card-body>
    </x-card>

    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Historique des contrats de travail" type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = ['Type', 'Date début', 'Date fin', 'Durée', 'Salaire', 'Statut', 'Document', ''];
                    $empty = 'Aucun contrat de travail disponible';
                @endphp
                <x-table :headers="$headers">
                    <x-table.body>
                        @forelse ($collaborateur->contrat_travails as $row)
                            <tr>
                                <x-table.cell content="{{ $row->type_contrat->label() }}" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_debut)->translatedFormat('d F Y') }}" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_fin)->translatedFormat('d F Y') }}" />
                                <x-table.cell
                                    content="{{ $row->date_fin ? \Carbon\Carbon::parse($row->date_debut)->diffInDays($row->date_fin) . ' jours' : '' }}" />
                                <x-table.cell content="{{ $row->salaire }}" />

                                <x-table.cell>
                                    <x-badge.statut :statut="$row->statut" />
                                </x-table.cell>
                                <x-table.cell>
                                    @if ($row->document_path)
                                        <a href="{{ Storage::url($row->document_path) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                            <x-heroicon-o-document class="inline-block h-5 w-5" />
                                        </a>
                                    @else
                                        <span class="text-gray-500 dark:text-gray-400">Aucun document</span>
                                    @endif
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
                </x-table>
            </div>
        </x-card.card-body>
    </x-card>
</section>
