<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('direccion_envio', function (Blueprint $table) {
            $table->increments('id_direccion_envio'); // Clave primaria autoincremental
            $table->string('calle', 200)->nullable();
            $table->integer('numero_interior')->nullable();
            $table->integer('numero_exterior')->nullable();
            $table->integer('id_codigo')->nullable()->index(); // Clave foránea
            $table->integer('id_delegacion')->nullable()->index(); // Clave foránea
            $table->integer('id_ciudad')->nullable()->index(); // Clave foránea
            $table->integer('id_estado')->nullable()->index(); // Clave foránea
            $table->string('colonia', 200)->nullable();
            $table->string('referencias', 300)->nullable();
            $table->timestamps(); // Incluye columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccion_envio');
    }
};
