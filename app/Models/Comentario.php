<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use SoftDeletes;

    protected $table = 'comentarios';

    protected $fillable = ['platillo_id', 'cliente_id', 'user_id', 'comentario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function platillo()
    {
        return $this->belongsTo(Platillo::class, 'platillo_id');
    }
}