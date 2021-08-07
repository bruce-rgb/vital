<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('id_patient');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_doctor');
            $table->date('birthday');
            $table->timestamps();

            //foreign key
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_doctor')->references('id_doctor')->on('doctors');
            // $table->foreignId('id_user')->constrained('users');
            // $table->foreignId('id_doctor')->constrained('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
