<?php
/**
 * Class ScoreRule
 * @package Ekkosense\Yacht
 * @author kliko <kliko.atanasov@gmail.com>
 * Created on: 2022-October-10/5/2022 13:16
 */

namespace Ekkosense\Yacht;


use Illuminate\Support\Collection;

class ScoreRule {
    public function getScore(Collection $rolls) {
        if ($this->isStraight($rolls)) {
            return 40;
        }

        return $rolls->sum();
    }

    private function isStraight(Collection $rolls) {
        if(
            ($rolls->has(1) || $rolls->has(6)) &&
            $rolls->has(2) &&
            $rolls->has(3) &&
            $rolls->has(4) &&
            $rolls->has(5)
        ) {
            return true;
        }

        return false;
    }
}
