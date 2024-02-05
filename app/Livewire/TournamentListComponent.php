<?php

namespace App\Livewire;

use Livewire\Component;

class TournamentListComponent extends Component
{
    public $tournaments;

    public function render()
    {
        return view('livewire.tournament-list-component');
    }
}
