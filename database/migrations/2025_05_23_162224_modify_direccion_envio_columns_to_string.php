<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('direccion_envio', function (Blueprint $table) {
            // Cambiar los campos a tipo string
            $table->string('id_codigo', 10)->nullable()->change();
            $table->string('id_delegacion', 100)->nullable()->change();
            $table->string('id_ciudad', 100)->nullable()->change();
            $table->string('id_estado', 100)->nullable()->change();
            // Eliminar los timestamps para coincidir con el modelo
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('direccion_envio', function (Blueprint $table) {
            // Revertir los cambios
            $table->integer('id_codigo')->nullable()->change();
            $table->integer('id_delegacion')->nullable()->change();
            $table->integer('id_ciudad')->nullable()->change();
            $table->integer('id_estado')->nullable()->change();
            // Restaurar los timestamps
            $table->timestamps();
        });
    }
};