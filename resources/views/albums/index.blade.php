@extends('layouts.perfil')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary">Mis Álbumes</h2>

    @if($albums->isEmpty())
        <div class="alert alert-info text-center">
            No has creado ningún álbum todavía.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($albums as $album)
                <div class="col">
                    <a href="{{ route('albums.show', $album->id) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title">{{ $album->titulo }}</h5>
                            </div>
                            <div class="card-body">
                                @if($album->fotos->isEmpty())
                                    <p>No hay fotos en este álbum.</p>
                                @else
                                    <div class="row">
                                        @foreach($album->fotos as $foto)
                                            <div class="col-4 mb-2">
                                                <img src="{{ asset('/imagen/'. $foto->imagen) }}" class="img-thumbnail" alt="{{ $foto->titulo }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                {{-- Puedes eliminar el botón de "Ver Álbum" ya que el card entero es ahora un enlace --}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
