<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('id_doctor');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_unit')->nullable();
            $table->enum('specialty', ['General','Geriatrics','Internist','Gynecology']);
            $table->timestamps();

            //foreign key
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_unit')->references('id_unit')->on('medical_units');
            // $table->foreignId('id_user')->constrained('users');
            // $table->foreignId('id_unit')
            //     ->nullable()
            //     ->constrained('medical_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
