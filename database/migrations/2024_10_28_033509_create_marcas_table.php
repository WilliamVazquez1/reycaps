<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasTable extends Migration
{
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->id('id_marca');
            $table->string('nombre_marca', 100)->nullable();
            $table->string('descripcion_marca', 200)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}
