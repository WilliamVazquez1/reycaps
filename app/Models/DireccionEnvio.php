<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionEnvio extends Model
{
    use HasFactory;

    protected $table = 'direccion_envio'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_direccion_envio'; // Clave primaria de la tabla
    public $timestamps = false; // Desactivar timestamps para coincidir con la migración

    protected $fillable = [
        'calle',
        'numero_interior',
        'numero_exterior',
        'id_codigo',
        'id_delegacion',
        'id_ciudad',
        'id_estado',
        'colonia',
        'referencias'
    ];

    // Eliminar las relaciones ya que ahora almacenaremos valores de texto directamente
    // public function codigopostal() { ... }
    // public function delegacion() { ... }
    // public function ciudad() { ... }
    // public function estado() { ... }
}