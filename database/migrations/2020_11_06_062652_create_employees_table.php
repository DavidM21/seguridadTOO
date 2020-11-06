<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('dui', 10);
            $table->string('nit', 17);
            $table->string('isss', 10);
            $table->string('nup', 12);
            $table->string('address', 300);


            $table->unsignedBigInteger('job_position_id');
            $table->foreign('job_position_id')
                ->references('id')->on('job_positions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('marital_status_id');
            $table->foreign('marital_status_id')
                ->references('id')->on('marital_statuses')
                ->onDelete('cascade');

            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
                ->references('id')->on('genders')
                ->onDelete('cascade');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');

            //$table->foreignId('job_position_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('marital_status_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('gender_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('city_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
