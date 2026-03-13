<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservacion extends Model
{
    use SoftDeletes;

    // Le decimos explícitamente el nombre de la tabla
    protected $table = 'reservaciones';

    // Declaramos los campos que se pueden llenar (para evitar problemas de asignación masiva)
    protected $fillable = [
        'cliente_id',
        'sucursal_id',
        'fecha_hora',
        'numero_personas',
        'estatus'
    ];

    // RELACIÓN: Una reservación pertenece a un Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    // RELACIÓN: Una reservación pertenece a una Sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
}