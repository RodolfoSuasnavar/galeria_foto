@extends('layouts.home')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Subir Nueva Imagen</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-4">
                <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Álbum -->
                    <div class="mb-3">
                        <label for="album_id" class="form-label fw-bold">Seleccionar Álbum</label>
                        <select id="album_id" name="album_id" class="form-select @error('album_id') is-invalid @enderror">
                            <option value="">Elige un álbum</option>
                            @foreach($albumes as $album)
                                <option value="{{ $album->id }}">{{ $album->titulo }}</option>
                            @endforeach
                        </select>
                        @error('album_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Imagen -->
                    <div class="mb-4">
                        <label for="imagen" class="form-label fw-bold">Subir Imagen</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" required>
                        @error('imagen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Título -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-bold">Título de la Imagen</label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}" placeholder="Escribe un título descriptivo">
                        @error('titulo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-bold">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4" placeholder="Escribe una breve descripción de la imagen">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Privacidad -->
                    <div class="mb-3">
                        <label for="privacidad" class="form-label fw-bold">Privacidad</label>
                        <select id="privacidad" name="privacidad" class="form-select @error('privacidad') is-invalid @enderror">
                            <option value="publico" {{ old('privacidad') == 'publico' ? 'selected' : '' }}>Público</option>
                            <option value="privado" {{ old('privacidad') == 'privado' ? 'selected' : '' }}>Privado</option>
                        </select>
                        @error('privacidad')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Botón de Subir -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Subir Imagen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

