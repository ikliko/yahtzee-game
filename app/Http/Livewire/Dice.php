<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dice extends Component {
    public $value;

    public function render() {
        return view('livewire.dice');
    }
}
