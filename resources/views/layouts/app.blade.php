<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->

    <!-- Custom Styles -->
    <style>
        nav.navbar {
            font-size: 1.2rem;
            padding: 1rem;
            background-color: black;
        }
        nav.navbar a.nav-link {
            color: white;
            margin: 0 15px;
            transition: color 0.3s ease;
        }
        nav.navbar a.nav-link.active {
            color: #FFC107; /* Color amarillo cuando está activo */
        }
        nav.navbar a.nav-link:hover {
            color: #FFC107; /* Efecto hover en amarillo */
        }
        .navbar-brand img {
            height: 60px; /* Tamaño del logo */
        }
        .navbar-nav {
            text-align: center;
            margin: auto;
        }
        nav.sticky-top {
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        footer {
            background-color: #343a40;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="/logo.png" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Menú centrado -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('servicio') ? 'active' : '' }}" href="{{ route('servicio') }}">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('galeria') ? 'active' : '' }}" href="{{ route('galeria') }}">Galería</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('citas') ? 'active' : '' }}" href="{{ route('citas') }}">Citas</a>
                        </li>
                    </ul>

                    <a href="{{route('login')}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="white" className="size-6" width="30px" height="30px">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg></a>
                    
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

        <!-- Footer -->
        <footer class="text-white mt-5">
            <div class="container py-4">
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
                        <a href="#" class="text-white"><img src="path-to-facebook-icon.png" alt="Facebook" height="30"></a>
                        <a href="#" class="text-white"><img src="path-to-twitter-icon.png" alt="Twitter" height="30"></a>
                        <a href="https://www.instagram.com" class="text-white"><img src="path-to-instagram-icon.png" alt="Instagram" height="30"></a>
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
