<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ask_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('anwer');

            $table->unsignedBigInteger('ask_id');
            $table->foreign('ask_id')->references('id')->on('asks');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;

            /*
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')
                ->references('id')->on('organizations')
                ->onDelete('cascade');
             *
             * */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ask_user');
    }
}
