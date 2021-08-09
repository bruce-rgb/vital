<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperatures', function (Blueprint $table) {
            $table->id('id_temperature');
            $table->unsignedBigInteger('id_patient');
            $table->decimal('temperature',4,2);
            $table->datetime('time');
            $table->timestamps();

            //foreign key
            $table->foreign('id_patient')->references('id_patient')->on('patients');
            // $table->foreignId('id_patient')->constrained('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temperatures');
    }
}
