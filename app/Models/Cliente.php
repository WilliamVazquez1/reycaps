<?php

namespace App\Models;
use App\Models\DireccionEnvio; // Importa el modelo Venta
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nombre de la tabla

    protected $primaryKey = 'id_cliente'; // Clave primaria

    public $timestamps = true; // La tabla incluye created_at y updated_at

    protected $fillable = [
        'id_persona',
        'id_direccion_envio',
        'contrasena',
    ];
    public function persona()
    {
        return $this->belongsTo(persona::class, 'id_persona');
    }
    public function direccionenvio()
    {
        return $this->belongsTo(direccionenvio::class, 'id_direccion_envio');
    }
    public function producto()
{
    return $this->belongsTo(Producto::class, 'id_producto'); // Reemplaza 'producto_id' por el nombre de la clave foránea correcta
}

}
