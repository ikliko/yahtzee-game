<?php
/**
 * Class Game
 * @package Ekkosense\Yacht
 * @author kliko <kliko.atanasov@gmail.com>
 * Created on: 2022-October-10/4/2022 14:17
 */

namespace Ekkosense\Yacht;

use App\Enums\GameStatuses;
use App\Models\Game as GameModel;
use App\Models\GamePlayer;
use Illuminate\Support\Facades\Auth;

class Game {
    public $playersCount;

    public function __construct($playersCount) {
        $this->playersCount = $playersCount;
    }

    public function play() {
        $gameInProgress = GameModel::where([
            ['status', GameStatuses::$IN_PROGRESS],
        ])->whereHas('players', function ($q) {
            $q->where([
                ['user_id', Auth::user()->id]
            ]);
        })->first();

        if($gameInProgress) {
            return  $gameInProgress;
        }

        $game = GameModel::where([
            ['status', GameStatuses::$AWAITING_PLAYERS],
        ])->first();

        if (!$game) {
            $game = new GameModel();
            $game->players_count = $this->playersCount;
            $game->status = GameStatuses::$AWAITING_PLAYERS;
            $game->save();
        }

        $isPlayerAlreadyHere = $game->players()->where([
            ['user_id', Auth::user()->id]
        ])->first();

        if ($isPlayerAlreadyHere) {
            return $game;
        }

        $player = new GamePlayer();
        $player->game_id = $game->id;
        $player->user_id = Auth::user()->id;
        $player->priority = $game->players()->count() + 1;
        $player->save();

        if ($game->players_count === $game->players()->count()) {
            $game->status = GameStatuses::$IN_PROGRESS;
            $game->save();
        }

        return $game;
    }

    public function print() {

    }
}
