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
    private $rolls;
    private $scoring;

    public function __construct($rolls) {
        $this->rolls = collect($rolls);
        $this->scoring = $this->getScoring();
    }

    public function getScore(Collection $rolls) {
        if ($this->isStraight()) {
            return 40;
        }

        if ($this->isYacht()) {
            return 50;
        }

        if ($this->isFullHouse()) {
            return 25;
        }

        if ($this->isFourOfAKind()) {
            return 30;
        }

        if ($this->isThreeOfAKind()) {
            return 20;
        }

        return $rolls->sum();
    }

    private function isLowStraight(): bool {
        return $this->rolls[0] === 1 &&
            $this->rolls[1] === 2 &&
            $this->rolls[2] === 3 &&
            $this->rolls[3] === 4 &&
            $this->rolls[4] === 5;
    }

    private function isHighStraight(): bool {
        return $this->rolls[0] === 2 &&
            $this->rolls[1] === 3 &&
            $this->rolls[2] === 4 &&
            $this->rolls[3] === 5 &&
            $this->rolls[4] === 6;
    }

    private function isStraight(): bool {
        return $this->isLowStraight() || $this->isHighStraight();
    }

    private function isYacht(): bool {
        return $this->getScoring()->count() === 1;
    }

    private function getScoring(): Collection {
        if (!$this->scoring) {
            $scoring = [];

            foreach ($this->rolls as $roll) {
                if (!array_key_exists($roll, $scoring)) {
                    $scoring[$roll] = 1;

                    continue;
                }

                $scoring[$roll]++;
            }

            $this->scoring = collect($scoring);
        }

        return $this->scoring;
    }

    private function isFullHouse(): bool {
        $scoring = $this->getScoring();

        if($scoring->count() !== 2) {
            return false;
        }

        foreach ($scoring as $score) {
            if($score === 3) {
                return true;
            }
        }

        return false;
    }

    private function isFourOfAKind(): bool {
        return $this->scoring->count() === 2 && !$this->isFullHouse();
    }

    private function isThreeOfAKind() {
        return $this->scoring->count() === 3;
    }
}
