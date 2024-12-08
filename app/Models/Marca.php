<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas'; // Nombre de la tabla

    protected $primaryKey = 'id_marca'; // Clave primaria

    public $timestamps = true; // La tabla incluye created_at y updated_at

    protected $fillable = [
        'nombre_marca',
        'descripcion_marca',
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_marca');
    }
}
