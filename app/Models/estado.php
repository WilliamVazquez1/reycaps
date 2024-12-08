<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_estado'; // Clave primaria de la tabla

    public $timestamps = false; // No incluye timestamps, ya que no están en la tabla

    protected $fillable = [
        'nombre_estado',
    ];
    public function direccionenvio()
    {
        return $this->belongsTo(direccionenvio::class, 'id_direccion_envio');
    }
}
