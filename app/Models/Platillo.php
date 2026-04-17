<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Comentario; // Esto le dice a Laravel dónde buscar el modelo


class Platillo extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'nombre', 
    'descripcion', 
    'precio', 
    'foto', // Debe coincidir con la base de datos
    'disponible'
];



    // Esta es la relación que falta y causa el error de la imagen af210f.png
    // app/Models/Platillo.php
public function comentarios() {
    return $this->hasMany(Comentario::class, 'platillo_id');
}

}
