<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $guarded = [];

    // Relación: El cliente pertenece a una Persona (para traer su nombre/correo)
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
}