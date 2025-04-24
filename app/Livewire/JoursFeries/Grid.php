<?php

namespace App\Livewire\JoursFeries;

use App\Models\JourFerie;
use Carbon\Carbon;
use Livewire\Component;

class Grid extends Component
{
    public $joursFeries = [];
    public $year;

    public function mount()
    {
        $this->year = Carbon::now()->year;
        $this->loadJoursFeries();
    }

    public function updatedYear()
    {
        $this->loadJoursFeries();
    }

    protected function loadJoursFeries()
    {
        // Récupérer les jours fériés pour l'année actuelle
        $startOfYear = Carbon::createFromDate($this->year, 1, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate($this->year, 12, 31)->endOfDay();

        $this->joursFeries = JourFerie::whereBetween('date', [$startOfYear, $endOfYear])
            ->orWhere('est_recurrent', true)
            ->orderBy('date')
            ->get()
            ->map(function ($jourFerie) {
                $date = Carbon::parse($jourFerie->date);
                if ($jourFerie->est_recurrent) {
                    $date = Carbon::createFromDate($this->year, $date->month, $date->day);
                }
                $jourFerie->formatted_date = $date;
                return $jourFerie;
            });
    }

    public function render()
    {
        return view('livewire.jours-feries.grid');
    }
}
