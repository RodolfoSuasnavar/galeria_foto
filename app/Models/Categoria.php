<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';  // Especifica que este modelo hace referencia a la tabla 'categorias'

    // Relación muchos a muchos con Foto
    public function fotos()
    {
        return $this->belongsToMany(Foto::class);
    }
}
