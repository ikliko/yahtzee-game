<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DicesList extends Component {
    public $dices = [1, 1, 1, 1, 1];

    public function getListeners() {
        $listeners = [];
        $listeners['ROLL_DICES'] = 'roll';

        return $listeners;
    }

    public function roll() {
        $this->dices = collect($this->dices)->map(function ($value) {
            return rand(1, 6);
        });


    }

    public function render() {
        return view('livewire.dices-list');
    }
}
