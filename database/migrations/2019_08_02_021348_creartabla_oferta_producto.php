<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreartablaOfertaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('precio_oferta');
            $table->dateTime('fecha');
            $table->unsignedInteger('oferta_id');
            $table->unsignedInteger('producto_id');
            $table->foreign('oferta_id')->references('id')->on('oferta')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta_producto');
    }
}
