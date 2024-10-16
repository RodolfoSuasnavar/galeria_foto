<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
class PortafolioController extends Controller
{
    public function index(Request $request)
    {
        // Recupera todas las fotos con privacidad pública
        $fotos = Foto::where('privacidad', 'publico')->get();
        return view('principal', compact('fotos'));
    }

    public function show($id){
        $foto = Foto::findOrFail($id);
        return view('welcome', compact('foto'));

    }

}
