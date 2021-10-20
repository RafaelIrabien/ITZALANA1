<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->double('precio_venta');
            $table->integer('cantidad'); //->default(0);
            $table->string('sku')->nullable();
            $table->integer('descuento_cantidad')->nullable();
            $table->integer('descuento_porcentaje')->nullable();
            $table->double('descuento_precio')->nullable(); //DESCUENTO PARA PRECIO FIJO


            $table->string('categoria');
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
        Schema::dropIfExists('productos');
    }
}
