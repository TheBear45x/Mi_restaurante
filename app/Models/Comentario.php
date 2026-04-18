<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use SoftDeletes;

    protected $table = 'comentarios';

    protected $fillable = ['platillo_id', 'user_id', 'comentario', 'calificacion'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function platillo()
    {
        return $this->belongsTo(Platillo::class, 'platillo_id');
    }
}