<?php

namespace App\Livewire\JoursFeries;

use App\Models\JourFerie;
use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public $year;
    public $months = [];
    public $joursFeries = [];

    public function mount()
    {
        $this->year = Carbon::now()->year;
        $this->generateCalendarData();
        $this->loadJoursFeries();
    }

    public function updatedYear()
    {
        $this->generateCalendarData();
        $this->loadJoursFeries();
    }

    public function prevYear()
    {
        $this->year--;
        $this->generateCalendarData();
        $this->loadJoursFeries();
    }

    public function nextYear()
    {
        $this->year++;
        $this->generateCalendarData();
        $this->loadJoursFeries();
    }

    protected function generateCalendarData()
    {
        $this->months = [];
        $totalCells = 42; // 6 semaines × 7 jours

        for ($month = 1; $month <= 12; $month++) {
            $firstDay = Carbon::createFromDate($this->year, $month, 1);
            $daysInMonth = $firstDay->daysInMonth;

            // Calculate days from previous month to display
            $firstDayOfWeek = $firstDay->copy()->startOfWeek(Carbon::MONDAY + 1);
            $prevMonthDays = [];

            if ($firstDay->greaterThan($firstDayOfWeek)) {
                $currentDay = $firstDayOfWeek->copy();
                while ($currentDay->lt($firstDay)) {
                    $prevMonthDays[] = [
                        'day' => $currentDay->day,
                        'date' => $currentDay->copy(),
                        'isCurrentMonth' => false
                    ];
                    $currentDay->addDay();
                }
            }

            // Current month days
            $currentMonthDays = [];
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $currentMonthDays[] = [
                    'day' => $day,
                    'date' => Carbon::createFromDate($this->year, $month, $day),
                    'isCurrentMonth' => true
                ];
            }

            // Calculate how many days we need from the next month to reach 42 total cells
            $daysFromPreviousMonth = count($prevMonthDays);
            $daysNeededFromNextMonth = $totalCells - $daysFromPreviousMonth - $daysInMonth;

            // Days from next month
            $nextMonthDays = [];
            $nextMonthDay = Carbon::createFromDate($this->year, $month, 1)->addMonth()->startOfMonth();

            for ($i = 0; $i < $daysNeededFromNextMonth; $i++) {
                $nextMonthDays[] = [
                    'day' => $nextMonthDay->day,
                    'date' => $nextMonthDay->copy(),
                    'isCurrentMonth' => false
                ];
                $nextMonthDay->addDay();
            }

            // Combine all days
            $allDays = array_merge($prevMonthDays, $currentMonthDays, $nextMonthDays);

            // Verify we have exactly 42 days
            if (count($allDays) !== $totalCells) {
                throw new \Exception("Calendar generation error: Expected {$totalCells} days but got " . count($allDays));
            }

            $this->months[] = [
                'name' => $firstDay->translatedFormat('F'),
                'number' => $month,
                'days' => $allDays
            ];
        }
    }

    protected function loadJoursFeries()
    {
        // Récupérer les jours fériés pour l'année actuelle
        $startOfYear = Carbon::createFromDate($this->year, 1, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate($this->year, 12, 31)->endOfDay();

        $joursFeries = JourFerie::whereBetween('date', [$startOfYear, $endOfYear])
            ->orWhere('est_recurrent', true)
            ->get();

        // Organiser les jours fériés par date
        $this->joursFeries = [];

        foreach ($joursFeries as $jourFerie) {
            $date = Carbon::parse($jourFerie->date);

            // Pour les jours fériés récurrents, on considère uniquement le mois et le jour
            if ($jourFerie->est_recurrent) {
                $dateKey = $date->format('m-d');
                foreach (range(1, 12) as $month) {
                    foreach (range(1, 31) as $day) {
                        if ($date->format('m-d') === sprintf('%02d-%02d', $month, $day)) {
                            $currentDate = Carbon::createFromDate($this->year, $month, $day);
                            if ($currentDate->isValid()) {
                                $dateString = $currentDate->format('Y-m-d');
                                if (!isset($this->joursFeries[$dateString])) {
                                    $this->joursFeries[$dateString] = [];
                                }
                                $this->joursFeries[$dateString][] = $jourFerie;
                            }
                        }
                    }
                }
            } else {
                $dateString = $date->format('Y-m-d');
                if (!isset($this->joursFeries[$dateString])) {
                    $this->joursFeries[$dateString] = [];
                }
                $this->joursFeries[$dateString][] = $jourFerie;
            }
        }
    }

    public function hasJoursFeries($date)
    {
        $dateString = $date->format('Y-m-d');
        return isset($this->joursFeries[$dateString]) && count($this->joursFeries[$dateString]) > 0;
    }

    public function getJoursFeriesForDate($date)
    {
        $dateString = $date->format('Y-m-d');
        return $this->joursFeries[$dateString] ?? [];
    }

    public function render()
    {
        return view('livewire.jours-feries.calendar');
    }
}
