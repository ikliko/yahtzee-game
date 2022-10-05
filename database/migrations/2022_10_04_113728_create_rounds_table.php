<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('game_id')->index();
            $table->unsignedInteger('player_id')->index();
            $table->unsignedInteger('score');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('rounds');
    }
}
