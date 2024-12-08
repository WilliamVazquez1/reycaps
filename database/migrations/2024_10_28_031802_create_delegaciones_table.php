<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegacionesTable extends Migration
{
    public function up()
    {
        Schema::create('delegaciones', function (Blueprint $table) {
            $table->id('id_delegacion'); // Usa un id personalizado
            $table->string('nombre_delegacion', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delegaciones');
    }
}
