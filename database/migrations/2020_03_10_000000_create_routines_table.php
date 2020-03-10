<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('repetitions')->unsigned();
            $table->bigInteger('sequences')->unsigned();
            $table->bigInteger('seconds_to_rest')->unsigned();
            $table->bigInteger('exercise_id')->unsigned();
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->bigInteger('training_id')->unsigned();
            $table->foreign('training_id')->references('id')->on('trainings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routines');
    }
}
