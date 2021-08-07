<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->id('id_distance');
            $table->unsignedBigInteger('id_patient');
            $table->decimal('distance',8,2);
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
        Schema::dropIfExists('distances');
    }
}
