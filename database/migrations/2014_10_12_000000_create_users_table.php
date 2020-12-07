<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->nullable();;
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('birthday')->nullable();
            $table->string('cell_phone');
            $table->string('passcode');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('temp_password')->nullable();
            $table->string('token_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('estado')->nullable();

        });
        /*
         * username, first_name, last_name, birthday, email, cell_phone, passcode, password
        nombres, apellidos, fecha de nacimiento, correo electrónico, su teléfono celular
            passcode, preguntas
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
