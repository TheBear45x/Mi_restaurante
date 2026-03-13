<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use SoftDeletes;

    protected $table = 'comentarios';

    protected $fillable = [
        'cliente_id',
        'platillo_id',
        'comentario',
        'calificacion'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function platillo()
    {
        return $this->belongsTo(Platillo::class, 'platillo_id');
    }
}