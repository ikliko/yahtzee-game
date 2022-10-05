<?php
/**
 * Class Player
 * @package Ekkosense\Yacht
 * @author kliko <kliko.atanasov@gmail.com>
 * Created on: 2022-October-10/4/2022 14:24
 */

namespace Ekkosense\Yacht;

class Player {
    public $name;
    public $score;

    public function __construct($name) {
        $this->name = $name;
    }

    public function play() {

    }

    public function reset() {

    }
}
