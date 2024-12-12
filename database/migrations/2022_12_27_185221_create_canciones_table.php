<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lanzamiento')->nullable();
            $table->integer('num_pista');
            $table->string('titulo');
            $table->integer('duracion');
            $table->integer('reproducciones');

            $table->timestamps();

            $table->foreign('id_lanzamiento')->references('id')->on('lanzamientos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canciones');
    }
}
