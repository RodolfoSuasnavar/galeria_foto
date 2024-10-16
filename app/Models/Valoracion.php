<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;
    protected $table = 'valoraciones';  // Especifica que este modelo hace referencia a la tabla 'valoraciones'

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
