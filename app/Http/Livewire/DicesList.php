<?php

namespace App\Http\Livewire;

use Ekkosense\Yacht\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DicesList extends Component {
    public $dices = [1, 1, 1, 1, 1];

    public function getListeners() {
        $listeners = [];
        $listeners['ROLL_DICES'] = 'roll';

        return $listeners;
    }

    public function roll() {
        $player = new Player(Auth::user()->name);
        $this->dices = $player->play();
    }

    public function render() {
        return view('livewire.dices-list');
    }
}
