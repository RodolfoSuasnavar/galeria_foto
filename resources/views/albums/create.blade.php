@extends('layouts.perfil')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Crear Nuevo Álbum</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('albums.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título del Álbum</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                            @error('titulo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Crear Álbum</button>
                            <a href="{{ route('albums.create') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
