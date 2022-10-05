<?php

namespace App\Http\Livewire;

use Ekkosense\Yacht\Game;
use Livewire\Component;

class GamePlay extends Component {
    public $gameId;

    public function rollDices() {
        $this->emit('ROLL_DICES');
    }

    public function render() {
        $game = new Game(2);
        $game = $game->play();
        $this->gameId = $game->id;

        return view('livewire.game-play', [
            'game' => $game
        ]);
    }
}
