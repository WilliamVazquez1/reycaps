<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Asegúrate de definir los atributos que se pueden asignar masivamente
    protected $fillable = ['total', 'user_id']; // Añade 'user_id' si es necesario

    // Opcional: definir las relaciones si es necesario
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
