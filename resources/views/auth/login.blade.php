@extends('layouts.login-regiter')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="container">
        <div class="image-section" style="background-image: url('{{ asset('img/2.jpeg') }}');"></div>
        <div class="form-section">
            <div class="form-container">
                <h2>Iniciar sesión</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" required autofocus placeholder="Coloca tu Correo" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required placeholder="Coloca tu Contraseña">
                    </div>
                    <div class="form-outline mb-4 text-start">
                        <label for="remember">
                            <input id="remember" type="checkbox" name="remember">
                            <span class="">Recuerdame</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit">Iniciar sesión</button>
                        <a href="{{ route('register') }}">¿No tienes una cuenta? Regístrate</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
