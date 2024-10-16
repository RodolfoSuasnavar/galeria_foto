<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; // Asegúrate de importar Hash
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    public function index()
    {
        $fotos = Foto::where('user_id', Auth::id())->get();
        $albumes = Album::all();
        return view('perfil.index', compact('fotos', 'albumes'));
    }


}
