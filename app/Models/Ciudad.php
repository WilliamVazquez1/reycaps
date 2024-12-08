<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_ciudad'; // Clave primaria de la tabla

    public $timestamps = true; // Para incluir timestamps en created_at y updated_at

    protected $fillable = [
        'nombre_ciudad',
        '',
    ];
    
}
