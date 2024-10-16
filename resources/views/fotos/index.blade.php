@extends('layouts.home')

@section('title', 'Mis Imágenes')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h2 class="text-primary">Mis Imágenes</h2>
        <a href="{{ route('fotos.create') }}" class="btn btn-outline-primary">Subir Nueva Imagen</a>
    </div>

    <!-- Mostrar galería de imágenes -->
    @if ($fotos->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            No tienes imágenes subidas aún.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($fotos as $foto)
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('/imagen/'. $foto->imagen) }}" class="card-img-top img-thumbnail" alt="{{ $foto->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $foto->titulo }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($foto->descripcion, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                            <small class="text-muted">Privacidad: {{ ucfirst($foto->privacidad) }}</small>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#asignarAlbumModal-{{ $foto->id }}">
                                Asignar a Álbum
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal para seleccionar el álbum -->
                <div class="modal fade" id="asignarAlbumModal-{{ $foto->id }}" tabindex="-1" aria-labelledby="asignarAlbumModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="asignarAlbumModalLabel">Asignar a Álbum</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('fotos.asignarAlbum', $foto->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="album_id" class="form-label">Selecciona un álbum</label>
                                        <select id="album_id" name="album_id" class="form-select" required>
                                            <option value="" disabled selected>Selecciona un álbum</option>
                                            @foreach ($albumes as $album)
                                                <option value="{{ $album->id }}">{{ $album->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Asignar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


@endsection
