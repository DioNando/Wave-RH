<div>
    <x-card type="primary" class="mb-4">
        <x-card.card-header type="primary">
            <h3 class="text-lg font-semibold">Jours fériés {{ $year }}</h3>
        </x-card.card-header>
    </x-card>

    <div class="space-y-3 overflow-auto">
        @forelse ($joursFeries as $jourFerie)
            <x-card class="overflow-hidden hover:shadow-md transition-shadow duration-200">
                <div class="relative">
                    {{-- @if ($jourFerie->est_recurrent)
                        <div class="absolute top-0 right-0 bg-blue-500 text-white text-xs px-2 py-1 rounded-bl">
                            Récurrent
                        </div>
                    @endif --}}

                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-md">{{ $jourFerie->nom }}</h4>
                        </div>

                        <div class="flex items-center text-sm text-blue-600 dark:text-blue-400 mb-1">
                            <x-heroicon-o-calendar class="size-4 mr-1" />
                            {{ $jourFerie->formatted_date->translatedFormat('d F Y') }}
                        </div>

                        @if ($jourFerie->description)
                            <p class="text-sm text-gray-500">{{ $jourFerie->description }}</p>
                        @endif

                        <div class="mt-2 space-x-1">
                            @php
                                $badgeColor = match ($jourFerie->type->value) {
                                    \App\Enums\TypeJourFerie::NATIONAL->value => 'red',
                                    \App\Enums\TypeJourFerie::RELIGIEUX->value => 'green',
                                    default => 'gray',
                                };
                                $badgeLabel = $jourFerie->type->label();
                            @endphp
                            <x-badge.item :text="$badgeLabel" :color="$badgeColor" />
                            @if ($jourFerie->est_recurrent)
                                <x-badge.item text="Récurrent" color="blue" />
                            @endif
                        </div>
                    </div>
                </div>
            </x-card>
        @empty
            <div class="text-center p-4 bg-gray-50 rounded-lg">
                <p class="text-gray-500">Aucun jour férié trouvé pour cette année.</p>
            </div>
        @endforelse
    </div>
</div>
