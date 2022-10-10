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
        $dices = collect([3, 3,3,3,3])
//            ->map(function ($value) {
//                return rand(1, 6);
//            });
        ;

        $scoreRule = new ScoreRule($dices);
        $scoreRule->getScore($dices);

        return $dices;
    }

    public function reset() {

    }
}
