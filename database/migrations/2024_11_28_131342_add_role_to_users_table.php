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
        Schema::table('users', function (Blueprint $table) {
            // Agregar la columna 'role' a la tabla 'users'
            $table->string('role')->default('cliente'); // Default es 'cliente', puedes cambiarlo según necesites
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar la columna 'role' si decidimos revertir la migración
            $table->dropColumn('role');
        });
    }
};
