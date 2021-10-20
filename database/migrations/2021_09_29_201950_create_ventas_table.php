<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->integer('producto_id');
            $table->integer('tienda_id');
            $table->integer('qty');
            $table->double('precio');
            $table->integer('cliente_id')->nullable();
            $table->integer('tipo_pago')->nullable();
            $table->double('pagado')->nullable();
            $table->double('recibido')->nullable();
            $table->double('cambio')->nullable();
            $table->integer('pedido_id')->nullable();
            $table->integer('usuario_id')->nullable();
            $table->integer('es_oferta')->nullable();
            $table->integer('estado');
            $table->integer('esta_pagado');
            $table->string('comentarios')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
