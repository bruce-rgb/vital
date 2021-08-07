<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeartRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heart_rates', function (Blueprint $table) {
            $table->id('id_heart');
            $table->unsignedBigInteger('id_patient');
            $table->integer('heart_rate');
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
        Schema::dropIfExists('heart_rates');
    }
}
