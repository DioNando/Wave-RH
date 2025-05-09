@props(['collaborateur'])

<section x-show="activeTab === 'historique'" x-cloak class="space-y-4">
    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Historique" type="primary" />
        <x-card.card-body divider>
            <x-card.card-row label="Créé le"
                value="{{ \Carbon\Carbon::parse($collaborateur->created_at)->translatedFormat('d F Y') . ' (' . \Carbon\Carbon::parse($collaborateur->created_at)->diffForHumans() . ')' }}" />
            <x-card.card-row label="Modifié le"
                value="{{ \Carbon\Carbon::parse($collaborateur->updated_at)->translatedFormat('d F Y') . ' (' . \Carbon\Carbon::parse($collaborateur->updated_at)->diffForHumans() . ')' }}" />
        </x-card.card-body>
    </x-card>
    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Historique des postes" subtitle="Évolution des postes occupés"
            type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = [
                        ['content' => 'Poste', 'align' => 'text-left'],
                        ['content' => 'Département', 'align' => 'text-left'],
                        ['content' => 'Date début', 'align' => 'text-left'],
                        ['content' => 'Date fin', 'align' => 'text-left'],
                        ['content' => 'Durée (mois)', 'align' => 'text-left'],
                        ['content' => 'Commentaires', 'align' => 'text-left'],
                        ['content' => 'Raison fin', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                    ];
                    $empty = 'Aucun historique de poste disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->historique_postes as $row)
                            <tr>
                                <x-table.cell class="font-medium" content="{{ $row->poste->nom }}" />
                                <x-table.cell content="{{ $row->poste->departement->nom }}" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_debut)->translatedFormat('d F Y') }}" />
                                <x-table.cell
                                    content="{{ $row->date_fin ? \Carbon\Carbon::parse($row->date_fin)->translatedFormat('d F Y') : 'En cours' }}" />
                                <x-table.cell content="{{ $row->duree ?? ($row->date_debut ? round(\Carbon\Carbon::parse($row->date_debut)->diffInMonths(now())) : 'N/A') }}" />
                                <x-table.cell content="{{ $row->commentaires }}" />
                                <x-table.cell content="{{ $row->raison_fin }}" />
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
    {{-- REFERENCE --}}
    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Historique des congés" subtitle="Évolution des congés pris"
            type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = [
                        ['content' => 'Type de congé', 'align' => 'text-left'],
                        ['content' => 'Date début', 'align' => 'text-left'],
                        ['content' => 'Date fin', 'align' => 'text-left'],
                        ['content' => 'Durée', 'align' => 'text-left'],
                        ['content' => 'Motif', 'align' => 'text-left'],
                        ['content' => 'Commentaires', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                    ];
                    $empty = 'Aucun historique de congé disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->historique_conges as $row)
                            <tr>
                                <x-table.cell class="font-medium" content="{{ $row->type_conge->label() }}" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_debut)->translatedFormat('d F Y') }}" />
                                <x-table.cell
                                    content="{{ $row->date_fin ? \Carbon\Carbon::parse($row->date_fin)->translatedFormat('d F Y') : 'En cours' }}" />
                                <x-table.cell content="{{ $row->duree }} jour(s)" />
                                <x-table.cell class="font-medium" content="{{ $row->motif }}" />
                                <x-table.cell content="{{ $row->commentaires }}" />
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

    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Historique des augmentations"
            subtitle="Évolution des augmentations salariales" type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = [
                        ['content' => 'Ancien salaire', 'align' => 'text-right'],
                        ['content' => 'Nouveau salaire', 'align' => 'text-right'],
                        ['content' => 'Monnaie', 'align' => 'text-left'],
                        ['content' => 'Pourcentage', 'align' => 'text-left'],
                        ['content' => 'Motif', 'align' => 'text-left'],
                        ['content' => 'Commentaires', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                    ];
                    $empty = 'Aucun historique d\'augmentation disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->historique_augmentations as $row)
                            <tr>
                                <x-table.cell align="right" content="{{ $row->ancien_salaire }}" />
                                <x-table.cell align="right" content="{{ $row->nouveau_salaire }}" />
                                <x-table.cell content="{{ $row->monnaie->name }}" />
                                <x-table.cell content="{{ $row->pourcentage }}%" />
                                <x-table.cell content="{{ $row->motif }}" />
                                <x-table.cell content="{{ $row->commentaires }}" />
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

    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Historique des primes" subtitle="Évolution des primes reçues"
            type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = [
                        ['content' => 'Date de prime', 'align' => 'text-left'],
                        ['content' => 'Montant', 'align' => 'text-right'],
                        ['content' => 'Monnaie', 'align' => 'text-left'],
                        ['content' => 'Type de prime', 'align' => 'text-left'],
                        ['content' => 'Motif', 'align' => 'text-left'],
                        ['content' => 'Commentaires', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                    ];
                    $empty = 'Aucun historique de prime disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->historique_primes as $row)
                            <tr>
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_prime)->translatedFormat('d F Y') }}" />
                                <x-table.cell align="right" content="{{ $row->montant }}" />
                                <x-table.cell content="{{ $row->monnaie->name }}" />
                                <x-table.cell content="{{ $row->type_prime->name }}" />
                                <x-table.cell content="{{ $row->motif }}" />
                                <x-table.cell content="{{ $row->commentaires }}" />
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

    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Historique des formations"
            subtitle="Évolution des formations suivies" type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = [
                        ['content' => 'Titre', 'align' => 'text-left'],
                        ['content' => 'Organisme', 'align' => 'text-left'],
                        ['content' => 'Type de formation', 'align' => 'text-left'],
                        ['content' => 'Date début', 'align' => 'text-left'],
                        ['content' => 'Date fin', 'align' => 'text-left'],
                        ['content' => 'Résultat', 'align' => 'text-left'],
                        ['content' => 'Commentaires', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                    ];
                    $empty = 'Aucun historique de formation disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->historique_formations as $row)
                            <tr>
                                <x-table.cell class="font-medium" content="{{ $row->titre }}" />
                                <x-table.cell content="{{ $row->organisme }}" />
                                <x-table.cell content="{{ $row->type_formation->name }}" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_debut)->translatedFormat('d F Y') }}" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_fin)->translatedFormat('d F Y') }}" />
                                <x-table.cell content="{{ $row->resultat }}" />
                                <x-table.cell content="{{ $row->commentaires }}" />
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
    {{-- REFERENCE --}}
</section>
