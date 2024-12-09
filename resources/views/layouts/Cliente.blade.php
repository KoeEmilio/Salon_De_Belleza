<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cliente App') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f9f9f9;
        }
        nav.navbar {
            font-size: 1.2rem;
            padding: 1rem;
            background-color: black;
            border-bottom: 3px solid #ff69b4;
        }
        nav.navbar a.nav-link {
            color: #fff;
            margin: 0 15px;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        nav.navbar a.nav-link.active {
            color: #fff;
            font-weight: bold;
            border-bottom: 2px solid #ff69b4;
        }
        nav.navbar a.nav-link:hover {
            color: #ff69b4;
            text-shadow: 0 0 10px #ff69b4;
            transform: scale(1.1);
        }
        .navbar-brand img {
            height: 60px;
        }
        .footer-icon {
            margin: 0 15px;
        }
        footer {
            background-color: black;
            color: #fff;
            padding: 2rem 0;
            margin-top: 2rem;
        }
        footer h5 {
            color: #ff69b4;
        }
        footer a:hover {
            color: #ff69b4;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('cliente.inicio') }}">
                    <img src="/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cliente.dashboard') ? 'active' : '' }}" href="{{ route('cliente.dashboard') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cliente.citas') ? 'active' : '' }}" href="{{ route('cliente.citas') }}">Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cliente.perfil') ? 'active' : '' }}" href="{{ route('cliente.perfil') }}">Perfil</a>
                        </li>
                    </ul>
                    <a href="{{ route('logout') }}" class="nav-link" style="color:white;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

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
                        <a href="#" class="footer-icon text-white">
                            <i class="fab fa-facebook-f" style="font-size: 30px;"></i>
                        </a>
                        <a href="#" class="footer-icon text-white">
                            <i class="fab fa-twitter" style="font-size: 30px;"></i>
                        </a>
                        <a href="https://www.instagram.com" class="footer-icon text-white">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
