<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'album_id',
        'user_id',
        'imagen',
        'titulo',
        'descripcion',
        'privacidad',

    ];
    // Relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación inversa con Álbum
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    // Relación uno a muchos con Comentario
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    // Relación uno a muchos con Valoracion
    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class);
    }

    // Relación muchos a muchos con Categoria
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
