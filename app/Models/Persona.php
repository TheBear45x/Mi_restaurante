<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable; // Importante
use Illuminate\Notifications\Notifiable;

class Persona extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'personas'; // Tu tabla
    protected $fillable = [
    'nombre',
    'descripcion',
    'precio',
    'foto', 
    'disponible',
];

    public function getAuthPassword()
    {
        return $this->password; // Texto plano para tu sistema
    }
}