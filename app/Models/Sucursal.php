<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    use SoftDeletes;

    protected $table = 'sucursales';

    protected $fillable = [
        'nombre',
        'numero_sucursal',
        'calle',
        'telefono',
        'gerente',
        'codigo_postal',
        'estatus'
    ];
}