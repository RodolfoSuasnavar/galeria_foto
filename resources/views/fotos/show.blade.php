@extends('layouts.foto')

@section('title', 'Ver Imagen')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <img src="data:image/jpeg;base64,{{ base64_encode($foto->imagen) }}" class="card-img-top img-fluid" alt="{{ $foto->titulo }}">
                <div class="card-body">
                    <h4 class="card-title text-center text-primary">{{ $foto->titulo }}</h4>
                    <p class="card-text text-center">{{ $foto->descripcion }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light">
                    <span class="text-muted">Privacidad: {{ ucfirst($foto->privacidad) }}</span>
                    <a href="{{ route('fotos.index') }}" class="btn btn-sm btn-outline-secondary">Volver a mis imágenes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
