<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContienensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contienens', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_lanzamiento');
            $table->unsignedBigInteger('id_cancion');

            $table->foreign('id_lanzamiento')->references('id')->on('lanzamientos')->onDelete('CASCADE');
            $table->foreign('id_cancion')->references('id')->on('canciones')->onDelete('CASCADE');

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
        Schema::dropIfExists('contienens');
    }
}
