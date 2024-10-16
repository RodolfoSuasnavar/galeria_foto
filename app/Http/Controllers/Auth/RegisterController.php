<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register'); // Asegúrate de tener esta vista
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'required' => 'El campo :attribute no es válido.',
            'email' => 'El campo :attribute debe ser una dirección de correo válida.',
            'max' => 'El campo :attribute no debe ser mayor a :max caracteres.',
            'unique' => 'El campo :attribute ya está registrado.',
            'confirmed' => 'Las contraseñas no coinciden.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
        ]);

        $user = new User();
        $user->nombre = $request->nombre;
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->foto_perfil = 'img/avatar.jpg';

        $user->save();

        Auth::login($user);

        return redirect()->route('principal');

    }

    // public function edit($id)
    // {
    //     // Encuentra la categoría por ID
    //     $user = User::findOrFail($id);

    //     // Pasa la categoría a la vista
    //     return view('categoria.edit', compact('categoria')); // Asegúrate de que esta vista exista
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function updateFoto(Request $request, $id)
{
    $user = User::findOrFail($id);

    if ($request->hasFile('foto_perfil')) {
        // Elimina la foto anterior si existe
        if ($user->foto_perfil && file_exists(public_path($user->foto_perfil))) {
            unlink(public_path($user->foto_perfil));
        }

        // Guarda la nueva foto en `public/imagen`
        $file = $request->file('foto_perfil');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('imagen'), $filename);

        // Actualiza la ruta de la foto en el usuario
        $user->foto_perfil = 'imagen/' . $filename;
    }

    $user->save();

    return redirect()->route('config')->with('success', 'La foto se ha actualizado con éxito.');
}




    public function updateDatos(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:255',

        ], [
            'required' => 'El campo :attribute no es válido.',
            'max' => 'El campo :attribute no debe ser mayor a :max caracteres.',

        ]);
        $user->nombre = $request->nombre;
        $user->usuario = $request->usuario;


        $user->save();

        return redirect()->route('config')->with('success', 'Los Datos se han actualizada con éxito.');


    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([

            'password' => 'required|string|min:6|confirmed',
        ], [
            'required' => 'El campo :attribute no es válido.',
            'confirmed' => 'Las contraseñas no coinciden.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
        ]);

        $user->password = bcrypt($request->password);


        $user->save();

        return redirect()->route('config')->with('success', 'La Contraseña se ha actualizada con éxito.');


    }

}
