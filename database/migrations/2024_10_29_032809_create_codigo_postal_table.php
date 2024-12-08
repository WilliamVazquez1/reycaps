<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigoPostalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_postal', function (Blueprint $table) {
           
            $table->integer('id_codigo')->unique(); // Columna para el código postal
            $table->string('descripcion_codigo', 10)->nullable(); // Columna para la descripción del código postal
            $table->timestamps(); // Agrega columnas para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codigo_postal'); // Elimina la tabla si existe
    }
}
