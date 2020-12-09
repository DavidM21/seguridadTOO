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
            $table->integer('number_of_locks')->default('0');
            $table->integer('password_changes')->default('0');
            $table->integer('number_of_roles')->default('0');

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
