<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';  // Especifica que este modelo hace referencia a la tabla 'comentarios'

    // Relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación inversa con Foto
    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }
}
