@extends('layouts.home')

@section('title', 'Global | SnapGallery')

@section('content')

<div class="container mt-4">
    <h2 class="text-primary mb-4 text-center">Fotos Públicas</h2>

    @if($fotos->isEmpty())
        <div class="alert alert-info text-center">
            No hay fotos públicas disponibles.
        </div>
    @else
        <div class="row g-3">
            @foreach($fotos as $foto)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('welcome', $foto->id) }}" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm rounded overflow-hidden">
                            <img src="{{ asset('/imagen/'. $foto->imagen) }}" class="card-img-top img-fluid" alt="{{ $foto->titulo }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">{{ $foto->titulo }}</h5>
                                <p class="card-text flex-grow-1 text-truncate">{{ Str::limit($foto->descripcion, 100) }}</p>
                                <div class="mt-3">
                                    <small class="text-muted">Publicado por: {{ $foto->user->usuario }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
