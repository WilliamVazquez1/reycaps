<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegacion extends Model
{
    use HasFactory;

    protected $table = 'delegaciones'; // Nombre de la tabla

    protected $primaryKey = 'id_delegacion'; // Clave primaria

    public $timestamps = false; // La tabla no incluye created_at y updated_at

    protected $fillable = [
        'id_delegacion', // Si no se usa un incremento automático, se puede incluir
        'nombre_delegacion',
    ];
    public function direccionenvio()
{
    return $this->hasMany(DireccionEnvio::class, 'id_delegacion');
}

   
}
