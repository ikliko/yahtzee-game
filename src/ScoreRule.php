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
        $digit = null;
        $countEquals = 0;

        foreach ($rolls as $roll) {
            if(!$digit) {
                $digit = $roll;
                continue;
            }

            if($digit === $roll) {
                $countEquals++;
            }
        }

        dd($rolls, $rolls, $countEquals, $rolls->sum());
    }
}
