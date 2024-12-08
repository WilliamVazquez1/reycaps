<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas'; // Nombre de la tabla

    protected $primaryKey = 'id_venta'; // Clave primaria

    public $timestamps = true; // La tabla incluye created_at y updated_at

    protected $fillable = [
        'id_producto',
        'id_cliente',
        'cantidad',
        'total',
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente'); // 'id_cliente' es la clave foránea en la tabla ventas
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto'); // Asegúrate de usar la clave foránea correcta
    }
    public function index()
{
    // Cargar las relaciones 'cliente' y, dentro de 'cliente', la relación 'persona'
    $ventas = Venta::with('cliente.persona')->get();


}
}