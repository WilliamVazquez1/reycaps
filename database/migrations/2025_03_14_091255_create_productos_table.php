<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('nombre_producto');
            $table->text('descripcion_producto');
            $table->decimal('precio', 8, 2);
            $table->integer('existencias_stock');

            // Clave foránea para 'marca'
            $table->unsignedBigInteger('id_marca')->nullable();
            $table->foreign('id_marca')->references('id')->on('marcas')->onDelete('set null');

            // Clave foránea para 'categoría'
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('set null');

            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
