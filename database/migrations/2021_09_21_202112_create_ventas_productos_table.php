<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_productos', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('sale_id');
            $table->integer('producto_id');
            $table->string('nombre');
            $table->integer('store_id');
            $table->integer('qty');
            $table->double('precio');
            $table->double('sub_total');
            $table->integer('is_offer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_productos');
    }
}
