<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model {
    use HasFactory;

    public function rounds() {
        return $this->hasMany(Round::class);
    }

    public function players() {
        return $this->hasMany(GamePlayer::class);
    }

    public function getActivePlayerAttribute() {
        if(!$this->rounds()->count()) {
            return $this->players()->orderBy('priority')->first();
        }

        dd(123);
    }
}
