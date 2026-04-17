<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insumo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'cantidad',
        'unidad_medida',
        'costo',
        'provedor_id',
    ];

}
