@extends('layouts.perfil')

@section('title', 'Configuraciones | SnapGallery')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

             <!-- Foto de Perfil -->
             <div id="foto_perfil" class="card shadow-sm mb-4 text-center">
                <div class="card-body">
                    <h5 class="card-title">Foto de Perfil</h5>
                    <div class="text-center mb-4">
                        <div class="profile-img-container">
                            <img id="profileImg" src="{{ Auth::user()->foto_perfil ? asset(Auth::user()->foto_perfil) : asset('img/avatar.jpg') }}" class="profile-img" alt="Foto de perfil">
                            <div class="edit-icon" onclick="document.getElementById('foto_perfil_input').click();" style="position: absolute; bottom: 0; right: 0; background: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 5px; cursor: pointer;">
                                <i class="fas fa-camera text-white"></i>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('update.foto', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="foto_perfil" id="foto_perfil_input" accept="image/*" class="d-none">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Actualizar Foto</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Información Personal -->
            <div id="informacion_personal" class="card shadow-sm mb-4 text-center">
                <div class="card-body">
                    <h5 class="card-title">Información Personal</h5>
                    <form action="{{route('update.informacion')}}" method="POST">
                        @csrf
                        @method('PUT') <!-- Simula el método PUT -->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->nombre }}"
                                style="text-align: center;" required >
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ Auth::user()->usuario }}"
                                style="text-align: center;" required>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"
                                style="text-align: center;" required readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Información</button>
                    </form>
                </div>
            </div>

            <!-- Cambio de Contraseña -->
            <div id="cambiar_contrasena" class="card shadow-sm mb-4 text-center">
                <div class="card-body">
                    <h5 class="card-title">Cambiar Contraseña</h5>
                    <form action="{{route('update.contrasena')}}" method="POST">
                        @csrf
                        @method('PUT') <!-- Simula el método PUT -->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <label for="current_password" class="form-label">Contraseña Actual</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <label for="new_password" class="form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label">Confirmar Nueva Contraseña</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Actualizar Contraseña</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Estilos adicionales -->

<style>

.profile-img-container {
        position: relative;
        cursor: pointer;
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%; /* Forma circular fija */
        display: inline-block;
    }

    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Asegura que la imagen se ajuste dentro del círculo */
    }

    .edit-icon {
        transition: background-color 0.3s ease;
    }

    .edit-icon:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }
</style>

<!-- Script para cambiar foto de perfil -->
<script>
    document.querySelector('.profile-img-container').addEventListener('click', function() {
        document.getElementById('foto_perfil_input').click();
    });

    document.getElementById('foto_perfil_input').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('profileImg').src = URL.createObjectURL(file);
        }
    });
    document.getElementById('foto_perfil_input').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('profileImg').src = URL.createObjectURL(file);
        }
    });

</script>
