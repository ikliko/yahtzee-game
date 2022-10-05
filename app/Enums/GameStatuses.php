<?php
/**
 * Class GameStatuses
 * @package App\Enums
 * @author kliko <kliko.atanasov@gmail.com>
 * Created on: 2022-October-10/4/2022 14:41
 */

namespace App\Enums;

class GameStatuses {
    /**
     * @var string when we are waiting more players to join
     */
    public static $AWAITING_PLAYERS = 'AWAITING_PLAYERS';
    /**
     * @var string when the game begins and it's in progress
     */
    public static $IN_PROGRESS = 'IN_PROGRESS';
    /**
     * @var string when game finish
     */
    public static $ENDED = 'ENDED';

    /**
     * I
     *
     * @return array with all possible statuses
     */
    public static function getAll() {
        return [
            self::$AWAITING_PLAYERS,
            self::$IN_PROGRESS,
            self::$ENDED,
        ];
    }
}
