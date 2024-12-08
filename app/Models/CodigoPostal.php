<?php

namespace App\Models;
use App\Models\DireccionEnvio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoPostal extends Model
{
    use HasFactory;

    protected $table = 'codigo_postal'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_codigo'; // Definir la clave primaria

    public $timestamps = true; // Habilitar timestamps (created_at y updated_at)

    protected $fillable = [
        'descripcion_codigo', // Campos que se pueden asignar masivamente
    ];
    public function DireccionEnvio()
    {
        return $this->belongsTo(DireccionEnvio::class, 'id_direccion_envio');
    }
    
}
