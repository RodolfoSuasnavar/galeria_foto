@extends('layouts.home')

@section('content')

<div class="container mt-4">
    <!-- Tarjeta que contiene la foto y la información -->
    <div class="card border-0 shadow-lg mx-auto" style="max-width: 800px; position: relative;">
        <!-- Botón de regresar dentro de la tarjeta, en la esquina superior izquierda -->
        <a href="{{ route('principal') }}" class="btn btn-light position-absolute top-0 start-0 mt-3 ms-3 rounded-circle" style="z-index: 10;">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="row g-0">
            <!-- Imagen de la foto -->
            <div class="col-lg-8 col-md-7">
                <img src="{{ asset('/imagen/'. $foto->imagen) }}" class="card-img-top img-fluid rounded-start" alt="{{ $foto->titulo }}" style="object-fit: cover; height: 100%; max-height: 500px;">
            </div>

            <!-- Información de la foto -->
            <div class="col-lg-4 col-md-5">
                <div class="card-body">
                    <h2 class="card-title text-primary">{{ $foto->titulo }}</h2>
                    <p class="card-text">{{ $foto->descripcion }}</p>
                    <hr>
                    <p class="text-muted"><strong>Privacidad:</strong> {{ ucfirst($foto->privacidad) }}</p>
                    <p class="text-muted"><strong>Subido por:</strong> {{ $foto->user->usuario }}</p>
                    <p class="text-muted"><strong>Fecha:</strong> {{ $foto->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
