<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tournament;

class TournamentTableComponent extends Component
{
    public $tournaments;
    public $confirmingDelete = false;
    public $editing = false;
    public $editedTournamentId;
    public $editedTournamentTitle;
    public $editedTournamentStart;
    public $editedTournamentEnd;
    public $editedTournamentVenue;

    public function render()
    {
        return view('livewire.tournament-table-component');
    }

    public function destroy($id)
    {
        $tournament = Tournament::find($id);

        if (!$tournament) {
            return redirect()->route('calendar.index')->with('error', 'Torneo no encontrado');
        }

        $tournament->delete();

        return redirect()->route('calendar.index')->with('success', 'Torneo eliminado con éxito');
    }

    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);

        $this->editing = true;
        $this->editedTournamentId = $tournament->id;
        $this->editedTournamentTitle = $tournament->name;
        $this->editedTournamentStart = $tournament->start_date;
        $this->editedTournamentEnd = $tournament->end_date;
        $this->editedTournamentVenue = $tournament->venue->name;
    }
}
