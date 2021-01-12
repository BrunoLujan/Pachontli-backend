<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veterinario_id');
            $table->unsignedBigInteger('mascota_id');
            $table->date('fecha');
            $table->time('hora');

            $table->foreign('veterinario_id')->references('id')->on('veterinarios');
            $table->foreign('mascota_id')->references('id')->on('mascotas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
