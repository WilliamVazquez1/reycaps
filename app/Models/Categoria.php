<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nombre de la tabla

    protected $primaryKey = 'id_categoria'; // Clave primaria

    public $timestamps = true; // La tabla incluye created_at y updated_at

    protected $fillable = [
        'nombre_categoria',
        'descripcion_categoria',
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}

