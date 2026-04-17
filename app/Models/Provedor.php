<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provedor extends Model
{
    use SoftDeletes;

    protected $table = 'provedores';

    protected $fillable = [
    'nombre',
    'encargado',
    'telefono',
    'correo',
    'estatus'
];
}