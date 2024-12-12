<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanzamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lanzamientos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_genero')->nullable();
            $table->string('nombre_lanzamiento');
            $table->text('descripcion_lanzamiento');
            $table->date('fecha_lanzamiento');
            $table->string('caratula');
            $table->string('tipo');

            $table->foreign('id_genero')->references('id')->on('generos')->onDelete('SET NULL');

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
        Schema::dropIfExists('lanzamientos');
    }
}
