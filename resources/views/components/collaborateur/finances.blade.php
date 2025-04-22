@props(['collaborateur'])

<section x-show="activeTab === 'finances'" x-cloak class="space-y-4">
    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Informations bancaires" type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = ['Nom de la banque', 'Titulaire', 'IBAN', 'SWIFT', 'Statut'];
                    $empty = 'Aucune information bancaire disponible';
                @endphp
                <x-table :headers="$headers">
                    <x-table.body>
                        @forelse ($collaborateur->information_bancaires as $row)
                            <tr>
                                <x-table.cell content="{{ $row->nom_banque }}" />
                                <x-table.cell content="{{ $row->titulaire_compte }}" />
                                <x-table.cell class="font-medium" content="{{ $row->iban }}" />
                                <x-table.cell content="{{ $row->code_swift }}" />
                                <x-table.cell>
                                    <x-badge.statut :statut="$row->statut" />
                                </x-table.cell>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 dark:text-gray-400">
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
