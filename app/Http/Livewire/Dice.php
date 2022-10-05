<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dice extends Component {
    public $value;
    protected $isInitial = true;
    public $isLocked = false;

    protected function getListeners() {
        $listeners = [];

        if(!$this->isLocked) {
            $listeners['ROLL_DICES'] = 'roll';
        }

        return $listeners;
    }

    public function __construct($id = null) {
        parent::__construct($id);

        $this->value = 1;
    }

    public function render() {
        return view('livewire.dice');
    }

    public function roll() {
        if ($this->isLocked) {
            return;
        }

        $this->value = rand(1, 6);
        $this->isInitial = false;
    }
}
