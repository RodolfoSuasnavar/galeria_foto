<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;
class HomeController extends Controller
{
    public function index()
    {
        // Recupera todas las fotos con privacidad pública
        $fotos = Foto::where('privacidad', 'publico')->get();
        return view('principal', compact('fotos'));
    }
}
