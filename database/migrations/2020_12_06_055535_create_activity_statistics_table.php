<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_statistics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('number_of_locks');
            $table->integer('password_changes');
            $table->integer('number_of_roles');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_statistics');
    }
}
