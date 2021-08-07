<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOxygensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxygens', function (Blueprint $table) {
            $table->id('id_oxygen');
            $table->unsignedBigInteger('id_patient');
            $table->decimal('oxygen',3,2);
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
        Schema::dropIfExists('oxygens');
    }
}
