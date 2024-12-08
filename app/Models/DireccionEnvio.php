<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CodigoPostal;
class DireccionEnvio extends Model
{
    use HasFactory;

    protected $table = 'direccion_envio'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_direccion_envio'; // Clave primaria de la tabla

    public $timestamps = false; // Para incluir timestamps en created_at y updated_at

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
    public function codigopostal()
    {
        return $this->belongsTo(CodigoPostal::class, 'id_codigo');
    }

    public function delegacion()
    {
        return $this->belongsTo(Delegacion::class, 'id_delegacion');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }


    
    


    
   
    
    
}
