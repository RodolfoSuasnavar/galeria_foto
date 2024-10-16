@extends('layouts.login-regiter')

@section('content')
<div class="container">
    <div class="image-section" style="background-image: url('{{ asset('img/img-5.jpg') }}');">
        <!-- La imagen de fondo en el lado izquierdo -->
    </div>
    <div class="form-section">
        <div class="form-container">
            <h2>Registrarse</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required
                    autofocus placeholder="Coloca tu nombre" autocomplete="off">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" type="text" name="usuario" value="{{ old('usuario') }}" required
                    autofocus placeholder="Coloca tu usuario" autocomplete="off">
                    @error('usuario')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    placeholder="Coloca tu correo" autocomplete="off">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required
                    placeholder="Coloca tu contraseña" autocomplete="off">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                    placeholder="Coloca de nuevo la contraseña" autocomplete="off">
                </div>

                <div class="form-group">
                    <button type="submit">Registrarse</button>
                </div>

                <div class="form-group">
                    <a href="{{ route('login') }}">¿Ya tienes una cuenta? Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
