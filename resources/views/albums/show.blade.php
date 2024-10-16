@extends('layouts.perfil')

@section('content')
<div class="container mt-4">
    <!-- Botón de Regresar -->
    <a href="{{ route('albums.index') }}" class="btn btn-outline-primary mb-4">
        <i class="bi bi-arrow-left"></i> Regresar
    </a>

    <div class="mb-4">
        <h2 class="text-primary">{{ $album->titulo }}</h2>
        <p class="text-muted">{{ $album->descripcion }}</p>
    </div>

    @if($album->fotos->isEmpty())
        <div class="alert alert-info text-center">
            No hay fotos en este álbum.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($album->fotos as $foto)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('/imagen/'. $foto->imagen) }}" class="card-img-top img-thumbnail" alt="{{ $foto->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $foto->titulo }}</h5>
                            <p class="card-text">{{ $foto->descripcion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
