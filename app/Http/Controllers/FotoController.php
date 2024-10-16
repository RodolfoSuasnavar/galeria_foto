<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        // Obtener fotos públicas del usuario autenticado
        $fotos = Foto::where('user_id', Auth::id())->where('privacidad', 'publico')->get();
        $albumes = Album::all(); // Obtener todos los álbumes
        return view('fotos.index', compact('fotos', 'albumes')); // Pasar las variables a la vista
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $albumes = Album::all(); // Asegúrate de tener una relación con Album
        return view('fotos.upload', compact('albumes'));
    }

    public function store(Request $request)
    {
        // Validación del formulario
        $request->validate([
            'album_id' => 'required|exists:albumes,id', // Cambiado de 'albumes_id' a 'album_id'
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'privacidad' => 'required|in:publico,privado',
        ]);

        // Preparar datos para guardar
        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Subir la imagen
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenFoto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move(public_path($rutaGuardarImg), $imagenFoto); // Guardar la imagen en el directorio 'public/imagen'
            $data['imagen'] = $imagenFoto; // Guardar el nombre del archivo en la base de datos
        }

        // Crear nueva entrada en la base de datos
        Foto::create($data);

        return redirect()->route('fotos.index')->with('success', 'Imagen subida exitosamente.');
    }

    public function asignarAlbum(Request $request, $id)
    {
        $request->validate([
            'album_id' => 'required|exists:albumes,id',
        ]);

        $foto = Foto::findOrFail($id);
        $foto->album_id = $request->input('album_id');
        $foto->save();

        return redirect()->route('fotos.index')->with('success', 'Foto asignada al álbum correctamente.');
    }

public function show(Request $request, $id){
    $foto = Foto::findOrFail($id);
    return view('fotos.show');
}

}
