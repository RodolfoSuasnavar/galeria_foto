<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // Solo invitados pueden acceder a la página de login
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');

    }
     public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'required' => 'El campo :attribute no es válido.',
            'email' => 'El campo :attribute debe ser una dirección de correo válida.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirectTo();
        }
        $remember = $request->has('remember'); // Obtener el valor del checkbox

        return redirect()->back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    protected function redirectTo()
    {
        // Verificar el rol del usuario autenticado
        if (Auth::user()->role == 'admin') {
            // Si es admin, redirigir a la vista de admin
            return redirect()->route('admin.admin');
        } elseif (Auth::user()->role == 'usuario') {
            // Si es un usuario normal, redirigir a la vista de usuario
            return redirect()->route('principal');
        }

        // Redirigir a una página por defecto si el rol no coincide (opcional)
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
