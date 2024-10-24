<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Recepcionista App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f9f9f9; /* Fondo claro para toda la página */
        }
        nav.navbar {
            font-size: 1.2rem;
            padding: 1rem;
            background-color: #ffb6c1; /* Rosa claro */
            border-bottom: 2px solid #ff69b4; /* Rosa fuerte */
        }
        nav.navbar a.nav-link {
            color: #fff; /* Texto blanco */
            margin: 0 15px;
            transition: color 0.3s ease;
        }
        nav.navbar a.nav-link.active {
            color: #fff; /* Mantener blanco cuando está activo */
            font-weight: bold; /* Hacer el texto activo en negrita */
            border-bottom: 2px solid #ff69b4; /* Línea debajo del enlace activo */
        }
        nav.navbar a.nav-link:hover {
            color: #ff69b4; /* Efecto hover en rosa fuerte */
        }
        .navbar-brand img {
            height: 60px; /* Tamaño del logo */
        }
        .navbar-nav {
            text-align: center;
            margin: auto;
        }
        footer {
            background-color: #ffb6c1; /* Rosa claro */
            color: #fff; /* Texto blanco en el pie de página */
            padding: 2rem 0; /* Espaciado vertical */
            margin-top: 2rem; /* Margen superior */
        }
        footer h5 {
            color: #ff69b4; /* Títulos en rosa fuerte */
        }
        footer a {
            color: #fff; /* Enlaces en blanco */
            transition: color 0.3s ease; /* Efecto de transición */
        }
        footer a:hover {
            color: #ff69b4; /* Cambiar color en hover */
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('recepcionista.inicio') }}">
                    <img src="/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.dashboard') ? 'active' : '' }}" href="{{ route('recepcionista.dashboard') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.citas') ? 'active' : '' }}" href="{{ route('recepcionista.citas') }}">Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.clientes') ? 'active' : '' }}" href="{{ route('recepcionista.clientes') }}">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.servicios') ? 'active' : '' }}" href="{{ route('recepcionista.servicios') }}">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.perfil') ? 'active' : '' }}" href="{{ route('recepcionista.perfil') }}">Perfil</a>
                        </li>
                    </ul>
        
                    <a href="{{route('login')}}" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="white" width="30px" height="30px">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
        
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Sobre Nosotros</h5>
                        <p>Descripción breve sobre la empresa o el servicio que ofreces.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Contacto</h5>
                        <p><strong>Teléfono:</strong> +123 456 7890</p>
                        <p><strong>Email:</strong> info@tuempresa.com</p>
                        <p><strong>Dirección:</strong> Calle Ejemplo 123, Ciudad, País</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Redes Sociales</h5>
                        <a href="#" class="text-white">
                            <i class="fab fa-facebook-f" style="font-size: 30px;"></i>
                        </a>
                        <a href="#" class="text-white">
                            <i class="fab fa-twitter" style="font-size: 30px;"></i>
                        </a>
                        <a href="https://www.instagram.com" class="text-white">
                            <i class="fab fa-instagram" style="font-size: 30px;"></i>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <p>© {{ date('Y') }} - Todos los derechos reservados. Mi Aplicación</p>
                </div>
            </div>
        </footer>
        
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
