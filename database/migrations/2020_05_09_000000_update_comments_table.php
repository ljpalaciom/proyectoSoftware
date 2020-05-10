<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign(['exercise_id']);
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');

            $table->dropForeign(['user_id']);
            $table->bigInteger('user_id')->unsigned()->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

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
