<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->integer('IdTeamHome');
            $table->integer('PtsTeamHome');
            $table->integer('GoalsTeamHome');
            $table->integer('GoalsAgainstTeamHome')->nullable();
            $table->integer('IdTeamVisitor');
            $table->integer('PtsTeamVisitor');
            $table->integer('GoalsTeamVisitor');
            $table->integer('GoalsAgainstTeamVisitor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
