<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homes.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>@yield('title','SnapGallery')</title>
    <style>
        /* Estilos para asegurar que el footer esté pegado abajo */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1; /* Este contenedor ocupa el espacio disponible entre el header y el footer */
        }

        footer {
            background-color: #ffffff;
            padding: 1rem;
            text-align: center;
        }
    </style>
    @stack('styles')
</head>

<body style="background-color: #e6e5e5" class="lilita-one-regular responsive">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #ffffff; box-shadow: none; border: none; padding: 1rem;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text lilita-one-regular" href="{{ route('home') }}" style="font-size: 2rem;">
                SnapGallery
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark text lilita-one-regular" href="{{ route('nosotros') }}" style="font-size: 1.5rem;">
                            Nosotros
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark text lilita-one-regular" href="{{ route('login') }}" style="font-size: 1.5rem;">
                            Iniciar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor de contenido principal -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-4" style="background-color: #ffffff;">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Redes sociales -->
            <div>
                <a href="https://facebook.com" class="me-3" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com" class="me-3" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>

            <!-- Información de la empresa -->
            <div class="text-end">
                <p class="mb-0">Empresa: SnapGallery</p>
                <p class="mb-0">Correo: </p>
                <p class="mb-0">Teléfono: 9191523317</p>
                <p class="mb-0">&copy; 2024 SnapGallery. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function updateDate() {
            const dateElement = document.getElementById('currentDate');
            const today = new Date();

            // Formatear la fecha
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = today.toLocaleDateString('es-ES', options);

            dateElement.textContent = formattedDate;
        }

        // Actualiza la fecha cuando se carga la página
        updateDate();
    </script>

</body>
</html>
