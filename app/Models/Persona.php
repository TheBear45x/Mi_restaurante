<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    protected $guarded = [];

    // Relación: Una persona puede ser un Cliente
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id_persona');
    }

    // Relación: Una persona puede ser un Empleado
    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'id_persona');
    }
}