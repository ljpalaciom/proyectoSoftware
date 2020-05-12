<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OptimizeAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->smallInteger('age')->change();
            $table->smallInteger('role')->change();
        });

        Schema::table('exercises', function (Blueprint $table) {
          $table->string('name')->change();
          $table->string('description')->nullable()->change();
          $table->string('recommendations')->nullable()->change();
          $table->string('path_video')->nullable()->change();
          $table->string('path_image')->nullable()->change();
        });

        Schema::table('trainings', function (Blueprint $table) {
          $table->string('name')->change();
          $table->smallInteger('day')->unsigned()->change();
        });

        Schema::table('routines', function (Blueprint $table) {
          $table->unsignedSmallInteger('repetitions')->change();
          $table->unsignedSmallInteger('sequences')->change();
          $table->unsignedSmallInteger('seconds_to_rest')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
    {

    }
}
