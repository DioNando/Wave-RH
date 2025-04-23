<div>
    <x-card>
        <x-card.card-body>
            <div class="flex items-center justify-end">
                <div class="flex items-center gap-3">
                    <x-button.action wire:click="prevYear" type="button" color="blue" icon="chevron-left" />

                    {{-- <input type="number" wire:model="year"
                        class="px-3 py-1.5 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md w-24 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400" /> --}}
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $year }}
                    </h2>
                    <x-button.action wire:click="nextYear" type="button" color="blue" icon="chevron-right" />

                </div>
            </div>
            <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 3xl:grid-cols-4">
                @foreach ($months as $month)
                    <div class="h-full">
                        <div class="p-4 h-full flex flex-col">
                            <h2
                                class="font-semibold text-blue-900 dark:text-blue-300 text-center mb-3 uppercase text-sm">
                                {{ $month['name'] }}</h2>
                            <div class="grid grid-cols-7 text-xs text-gray-500 dark:text-gray-400 mb-2 text-center">
                                <div>L</div>
                                <div>M</div>
                                <div>M</div>
                                <div>J</div>
                                <div>V</div>
                                <div>S</div>
                                <div>D</div>
                            </div>
                            <div
                                class="isolate grid grid-cols-7 gap-px rounded-lg bg-gray-200 dark:bg-gray-700 text-sm shadow-md outline-1 -outline-offset-1 outline-gray-200 dark:outline-gray-700 flex-grow">
                                @php
                                    // Cette variable permet d'avoir 6 lignes pour chaque mois (42 jours)
$totalCells = 42;
$currentCells = count($month['days']);
                                    $remainingCells = $totalCells - $currentCells;
                                @endphp

                                @foreach ($month['days'] as $dayData)
                                    @php
                                        $isToday = $dayData['date']->isToday();
                                        $isCurrentMonth = $dayData['isCurrentMonth'];
                                        $hasHoliday = $this->hasJoursFeries($dayData['date']);
                                        $isWeekend = $dayData['date']->isWeekend();

                                        // Classes dynamiques
                                        $buttonClasses = [
                                            'py-2 focus:z-10 hover:bg-blue-100 hover:text-blue-800 dark:hover:bg-blue-600',
                                        ];

                                        // Ajouter d'abord la classe pour les jours fériés pour qu'elle ait priorité
                                        if ($hasHoliday) {
                                            $buttonClasses[] = 'bg-blue-500 text-white';
                                        } else {
                                            // Sinon, appliquer les styles standards
                                            $buttonClasses[] = $isCurrentMonth
                                                ? 'bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200'
                                                : 'bg-gray-50 dark:bg-gray-900 text-gray-400 dark:text-gray-500';
                                        }

                                        // Ajouter les autres classes
                                        if ($isWeekend && $isCurrentMonth) {
                                            $buttonClasses[] = 'text-orange-600 dark:text-orange-400 font-medium';
                                        }

                                        // Ajouter les classes pour les coins arrondis
                                        $index = $loop->index;
                                        if ($index === 0) {
                                            $buttonClasses[] = 'rounded-tl-lg';
                                        }
                                        if ($index === 6) {
                                            $buttonClasses[] = 'rounded-tr-lg';
                                        }
                                        if ($index === $totalCells - 7) {
                                            $buttonClasses[] = 'rounded-bl-lg';
                                        }
                                        if ($index === $totalCells - 1) {
                                            $buttonClasses[] = 'rounded-br-lg';
                                        }

                                        // Classes pour l'affichage de la date
$timeClasses = [
    'mx-auto flex h-6 w-6 items-center justify-center',
    $isToday ? 'text-green-600 font-semibold rounded-full' : '',
                                        ];
                                    @endphp

                                    <button type="button"
                                        class="relative flex items-center justify-center {{ implode(' ', $buttonClasses) }}"
                                        @if ($hasHoliday) x-data="{ tooltip: false }"
                                    @mouseenter="tooltip = true"
                                    @mouseleave="tooltip = false" @endif>
                                        <time datetime="{{ $dayData['date']->format('Y-m-d') }}"
                                            class="{{ implode(' ', $timeClasses) }}">
                                            {{ $dayData['day'] }}
                                        </time>
                                        @if ($hasHoliday)
                                            <div x-show="tooltip"
                                                class="absolute shadow z-10 bottom-12 self-center rounded-md p-4 text-md bg-blue-600 text-white">
                                                {{ implode(', ',array_map(function ($holiday) {return $holiday->nom;}, $this->getJoursFeriesForDate($dayData['date']))) }}
                                            </div>
                                        @endif
                                    </button>
                                @endforeach

                                {{-- Ajouter des cellules vides supplémentaires pour uniformiser la taille --}}
                                @for ($i = 0; $i < $remainingCells; $i++)
                                    <div class="bg-gray-50 dark:bg-gray-900"></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card.card-body>
    </x-card>
</div>
