<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreartablaVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero_orden');
            $table->integer('numero_seguimiento')->nullable();
            $table->integer('estado');
            $table->integer('total');
            $table->dateTime('fecha_compra');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('metodo_pago_id');
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict')->nullable();;
            $table->foreign('metodo_pago_id')->references('id')->on('metodo_pago')->onDelete('restrict')->onUpdate('restrict')->nullable();;
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
