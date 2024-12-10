<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f9f9f9;
        }

        nav.navbar {
            font-size: 1rem;
            padding: 0.5rem;
            background-color: black;
            border-bottom: 2px solid #ff69b4;
        }

        nav.navbar a.nav-link {
            color: #fff;
            margin: 0 10px;
            transition: color 0.6s ease, transform 0.3s ease;
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
            height: 50px;
        }

        .dots-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 9999;
        }

        .dot {
            height: 16px;
            width: 16px;
            margin-right: 8px;
            border-radius: 50%;
            background-color: #ff69b4;
            animation: pulse 1.5s infinite ease-in-out;
        }

        .dot:last-child {
            margin-right: 0;
        }

        .dot:nth-child(1) {
            animation-delay: -0.3s;
        }

        .dot:nth-child(2) {
            animation-delay: -0.1s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.1s;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                background-color: #ff69b4;
                box-shadow: 0 0 0 0 rgba(255, 105, 180, 0.7);
            }

            50% {
                transform: scale(1.2);
                background-color: #ff1493;
                box-shadow: 0 0 0 10px rgba(255, 105, 180, 0);
            }

            100% {
                transform: scale(0.8);
                background-color: #ff69b4;
                box-shadow: 0 0 0 0 rgba(255, 105, 180, 0.7);
            }
        }

        footer {
            background-color: black;
            color: #fff;
            padding: 2rem 0;
            margin-top: 2rem;
            text-align: center;
        }

        footer h5 {
            color: #ff69b4;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        footer a {
            color: #fff;
            transition: color 0.3s ease;
            text-decoration: none;
        }

        footer a:hover {
            color: #ff69b4;
            text-shadow: 0 0 10px #ff69b4;
        }

        .footer-icon {
            margin: 0 15px;
            color: #ff69b4;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .footer-icon:hover {
            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            nav.navbar a.nav-link {
                font-size: 0.9rem;
                margin: 0 5px;
            }

            .navbar-brand img {
                height: 40px;
            }

            .dot {
                height: 12px;
                width: 12px;
                margin-right: 5px;
            }
        }
    </style>
</head>
<body>
    <div id="loader" class="dots-container" style="display: none;">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand">
                <img src="/AH1.png" alt="Logo">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color: #ff69b4"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('recepcionista.dashboard') ? 'active' : '' }}" href="{{ route('recepcionista.dashboard') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('appointment.index') ? 'active' : '' }}" href="{{ route('appointment.index') }}">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('recepcionista.clientes') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('recepcionista.servicios') ? 'active' : '' }}" href="{{ route('servicios_recepcionista') }}">Servicios</a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
