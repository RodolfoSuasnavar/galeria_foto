@extends('layouts.homes')
@section('title', 'Nosotros | SnapGallery')
@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold" style="font-size: 3rem; color: #333;">Nuestro Equipo</h1>

    <div class="row justify-content-center">
        <!-- Miembro del equipo 1 -->
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100 text-center">
                <img src="{{ asset('img/dani.jpg') }}" class="card-img-top" alt="Nombre del miembro 1" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #333;">Nombre del miembro 1</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Rol del miembro 1</p>
                    <p class="card-text" style="font-size: 0.9rem; color: #555;">Descripción breve del miembro 1.</p>
                </div>
            </div>
        </div>

        <!-- Miembro del equipo 2 -->
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100 text-center">
                <img src="{{ asset('img/may.jpg') }}" class="card-img-top" alt="Nombre del miembro 2" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #333;">Nombre del miembro 2</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Rol del miembro 2</p>
                    <p class="card-text" style="font-size: 0.9rem; color: #555;">Descripción breve del miembro 2.</p>
                </div>
            </div>
        </div>

        <!-- Miembro del equipo 3 -->
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100 text-center">
                <img src="{{ asset('img/jacob.jpg') }}" class="card-img-top" alt="Nombre del miembro 3" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #333;">Nombre del miembro 3</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Rol del miembro 3</p>
                    <p class="card-text" style="font-size: 0.9rem; color: #555;">Descripción breve del miembro 3.</p>
                </div>
            </div>
        </div>

        <!-- Miembro del equipo 4 -->
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100 text-center">
                <img src="{{ asset('img/rodo.jpg') }}" class="card-img-top" alt="Nombre del miembro 3" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #333;">Nombre del miembro 3</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">Rol del miembro 3</p>
                    <p class="card-text" style="font-size: 0.9rem; color: #555;">Descripción breve del miembro 3.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="container mt-5">
        <h2 class="text-center mb-5 fw-bold" style="font-size: 3rem; color: #333;">Contactanos</h2>

        <form>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre" required>
            </div>

            <!-- Correo electrónico -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico" required>
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" placeholder="Ingresa tu teléfono" required>
            </div>

            <!-- Mensaje -->
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
            </div>

            <!-- Botón de envío -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
            </div>
        </form>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>Nueva sección</h2>
    </div>
</section>



@endsection
