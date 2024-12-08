<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    public $timestamps = true; // Para incluir timestamps en created_at y updated_at

    protected $fillable = [
        'nombre_producto',
        'descripcion_producto',
        'precio',
        'existencias_stock',
        'id_marca',
        'id_categoria',
        'imagen'
    ];
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }
    public function categoria()
    {
        return $this->belongsTo(categoria::class, 'id_categoria');
    }
    



}
