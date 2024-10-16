<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albumes';  // Especifica que este modelo hace referencia a la tabla 'albumes'

    // Relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos con Photo
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
