<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservacion extends Model
{
    // Con esto le decimos a Laravel exactamente cómo se llama tu tabla en phpMyAdmin
    protected $table = 'reservaciones'; 


    // Declaramos los campos que se pueden llenar (para evitar problemas de asignación masiva)
    protected $fillable = [
        'user_id',
        'sucursal_id',
        'fecha_hora',
        'numero_personas',
        'estatus'
    ];

    // RELACIÓN: Una reservación pertenece a un Cliente
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // RELACIÓN: Una reservación pertenece a una Sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
}