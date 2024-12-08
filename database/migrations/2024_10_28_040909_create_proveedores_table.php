<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedor');

            $table->timestamps();

            // Agregar claves foráneas si es necesario
    
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
