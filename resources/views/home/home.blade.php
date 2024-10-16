@extends('layouts.homes')

@section('content')
 {{-- Contenido del home --}}
 <div class="carousel-text-container">
    <!-- Sección de Texto -->
    <div class="text-section">
        <div class="overlay  lilita-one-regular">
            <h1>Bienvenido a Nuestra Galería</h1>
            <p>Descubre imágenes increíbles seleccionadas cuidadosamente.</p>
        </div>
    </div>

    <!-- Carrusel de imágenes -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner image-section">
            <div class="carousel-item active">
                <img src="{{asset('img/img-1.jpg')}}" class="d-block w-100 carousel-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/2.jpeg')}}" class="d-block w-100 carousel-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/3.jpeg')}}" class="d-block w-100 carousel-img" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>

{{-- Sección adicional (ejemplo) --}}
{{-- <section class="section">
    <div class="container">
        <p class="section-heading"><span id="currentDate"></span></p>
        <h2 class="section-heading">Galería de Imágenes</h2>
        <p>Agrega aquí tu contenido adicional.</p>

        <div class="row">
            @if($fotos->isEmpty())
                <p>No hay imágenes públicas para mostrar.</p>
            @else
                @foreach($fotos as $foto)
                    <div class="col-md-4">
                        <img class="imgs img-thumbnail image-section" src="{{ asset($foto->ruta) }}" alt="Imagen">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section> --}}



<section class="section">
    <div class="container">
        <h2>Nueva sección</h2>
        <video class="imgsa" width="640" height="360" autoplay loop muted style="border-radius: 10px;">
            <source src="{{ asset('video/video-1.mp4')}}" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
          </video>
          <video class="imgsa" width="640" height="360" autoplay loop muted style="border-radius: 10px;">
            <source  src="{{ asset('video/video-2.mp4')}}" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
          </video>

    </div>
</section>

<section class="section">
    <div class="container">
        <h2>Nueva sección</h2>
    </div>
</section>



@endsection
