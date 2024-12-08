<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
