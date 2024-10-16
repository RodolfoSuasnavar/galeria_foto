<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    // public function index(){
    //     $albums = Album::where('user_id', Auth::id())->get();
    //     return view('albums.index', compact('albums'));
    // }

    public function index(){
        $albums = Album::where('user_id', Auth::id())
                ->with('fotos') // Cargar las fotos relacionadas
                ->get();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $album = new Album();
        $album->titulo = $request->titulo;
        $album->descripcion = $request->descripcion;
        $album->user_id = Auth::id(); // Asegúrate de que el usuario esté autenticado
        $album->save();

        return redirect()->route('albums.create')->with('success', 'Álbum creado exitosamente.');
    }

    public function show($id)
    {
        // Obtén el álbum junto con sus fotos
        $album = Album::with('fotos')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('albums.show', compact('album'));
    }
}
