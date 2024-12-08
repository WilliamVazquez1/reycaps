<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->increments('id_ciudad'); // Clave primaria autoincremental
            $table->string('nombre_ciudad', 100)->nullable(); // Nombre de la ciudad
            $table->integer('id_direccion_envio')->nullable()->unsigned(); // ID de dirección de envío (opcional)
            $table->timestamps(); // Para incluir created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudades'); // Elimina la tabla si existe
    }
}
