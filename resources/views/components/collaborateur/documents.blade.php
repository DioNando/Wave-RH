@props(['collaborateur'])

<section x-show="activeTab === 'documents'" x-cloak class="space-y-4">
    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Documents administratifs"
            subtitle="Liste des documents administratifs du collaborateur" type="primary" />
        <x-card.card-body>
            <div>
                @php
                    $headers = [
                        ['content' => 'Type de document', 'align' => 'text-left'],
                        ['content' => 'Date d\'émission', 'align' => 'text-left'],
                        ['content' => 'Date d\'expiration', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                        ['content' => '', 'align' => 'text-right'],
                    ];
                    $empty = 'Aucun document trouvé';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->document_administratifs as $row)
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
                                                now()->diffInDays(\Carbon\Carbon::parse($row->date_expiration), false),
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
                                <x-table.cell align="right">
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
    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Diplômes" subtitle="Liste des diplômes obtenus" type="primary" />
        <x-card.card-body>
            <div class="mb-6">
                @livewire('collaborateurs.diplomes.create', ['collaborateur' => $collaborateur])
            </div>
            <div>
                @php
                    $headers = [
                        ['content' => 'Titre', 'align' => 'text-left'],
                        ['content' => 'Établissement', 'align' => 'text-left'],
                        ['content' => 'Niveau', 'align' => 'text-left'],
                        ['content' => 'Date d\'obtention', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                        ['content' => '', 'align' => 'text-right'],
                    ];
                    $empty = 'Aucun diplôme disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->diplomes as $row)
                            <tr>
                                <x-table.cell class="font-medium" :content="$row->titre" />
                                <x-table.cell :content="$row->etablissement" />
                                <x-table.cell :content="$row->niveau->label()" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_obtention)->translatedFormat('d F Y') }}" />
                                <x-table.cell>
                                    <x-badge.statut :statut="$row->statut" />
                                </x-table.cell>
                                <x-table.cell align="right">
                                    <div class="flex gap-1 items-center justify-end">
                                        <x-button.action simple="true" target="_blank"
                                            href="{{ Storage::url($row->document_path) }}" icon="document"
                                            color="blue">Voir</x-button.action>
                                        <x-label.divide-vertical />
                                        <x-button.action simple="true" href="{{ route('diplomes.edit', $row->id) }}"
                                            icon="pencil-square" color="orange">Editer</x-button.action>
                                    </div>
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
    <x-card defaultOpen="false">
        <x-card.card-header :dropdown="true" title="Certifications" subtitle="Liste des certifications obtenues"
            type="primary" />
        <x-card.card-body>
            <div class="mb-6">
                @livewire('collaborateurs.certifications.create', ['collaborateur' => $collaborateur])
            </div>
            <div>
                @php
                    $headers = [
                        ['content' => 'Titre', 'align' => 'text-left'],
                        ['content' => 'Organisme', 'align' => 'text-left'],
                        ['content' => 'Pays', 'align' => 'text-left'],
                        ['content' => 'Date d\'obtention', 'align' => 'text-left'],
                        ['content' => 'Date d\'expiration', 'align' => 'text-left'],
                        ['content' => 'Statut', 'align' => 'text-left'],
                        ['content' => '', 'align' => 'text-right'],
                    ];
                    $empty = 'Aucune certification disponible';
                @endphp
                <table class="w-full">
                    <x-table.head :background="false">
                        @foreach ($headers as $header)
                            <x-table.head-cell :content="$header['content']" :align="$header['align']" />
                        @endforeach
                    </x-table.head>
                    <x-table.body>
                        @forelse ($collaborateur->certifications as $row)
                            <tr>
                                <x-table.cell class="font-medium" :content="$row->titre" />
                                <x-table.cell :content="$row->organisme" />
                                <x-table.cell :content="$row->pays->nom" />
                                <x-table.cell
                                    content="{{ \Carbon\Carbon::parse($row->date_obtention)->translatedFormat('d F Y') }}" />
                                <x-table.cell>
                                    <div class="flex flex-col">
                                        <span>{{ \Carbon\Carbon::parse($row->date_expiration)->translatedFormat('d F Y') }}</span>
                                        @php
                                            $daysLeft = round(
                                                now()->diffInDays(\Carbon\Carbon::parse($row->date_expiration), false),
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
                                <x-table.cell align="right">
                                    <div class="flex gap-1 items-center justify-end">
                                        <x-button.action simple="true" target="_blank"
                                            href="{{ Storage::url($row->document_path) }}" icon="document"
                                            color="blue">Voir</x-button.action>
                                        <x-label.divide-vertical />
                                        <x-button.action simple="true"
                                            href="{{ route('certifications.edit', $row->id) }}" icon="pencil-square"
                                            color="orange">Editer</x-button.action>
                                    </div>
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
