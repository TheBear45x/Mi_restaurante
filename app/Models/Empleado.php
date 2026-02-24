<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $guarded = [];

    // Relación: El empleado pertenece a una Persona (para traer su nombre/correo)
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
}