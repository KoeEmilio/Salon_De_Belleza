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

    <!-- Custom Styles -->
    <style>
.dots-container {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6); /* Fondo transparente oscuro */
  z-index: 9999; /* Para que esté siempre al frente */
}

.dot {
  height: 20px;
  width: 20px;
  margin-right: 10px;
  border-radius: 50%;
  background-color: #ff69b4; /* Color rosa */
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
    background-color: #ff69b4; /* Color inicial */
    box-shadow: 0 0 0 0 rgba(255, 105, 180, 0.7);
  }

  50% {
    transform: scale(1.2);
    background-color: #ff1493; /* Color más intenso */
    box-shadow: 0 0 0 10px rgba(255, 105, 180, 0);
  }

  100% {
    transform: scale(0.8);
    background-color: #ff69b4;
    box-shadow: 0 0 0 0 rgba(255, 105, 180, 0.7);
  }
}
        body {
            background-color: #f9f9f9; 
        }
        nav.navbar {
            font-size: 1.2rem;
            padding: 1rem;
            background-color: black; /* Rosa claro */
            border-bottom: 2px solid #ff69b4; /* Rosa fuerte */
        }
        nav.navbar a.nav-link {
            color: #fff; /* Texto blanco */
            margin: 0 15px;
            transition: color 0.6s ease, transform 0.3s ease; /* Transición suave para el color y tamaño */
        }
        nav.navbar a.nav-link.active {
            color: #fff; /* Mantener blanco cuando está activo */
            font-weight: bold; /* Hacer el texto activo en negrita */
            border-bottom: 2px solid #ff69b4; /* Línea debajo del enlace activo */
        }
        nav.navbar a.nav-link:hover {
            color: #ff69b4; /* Cambia el color a rosa fuerte al pasar el ratón */
            text-shadow: 0 0 10px #ff69b4; /* Efecto de brillo */
            transform: scale(1.1); /* Aumenta ligeramente el tamaño */
        }
        .navbar-brand img {
            height: 60px; /* Tamaño del logo */
        }
        footer {
        background-color: black; /* Fondo negro */
        color: #fff; /* Texto blanco en el pie de página */
        padding: 2rem 0; /* Espaciado vertical */
        margin-top: 2rem; /* Margen superior */
        text-align: center; /* Centrado de contenido */
    }

    footer h5 {
        color: #ff69b4; /* Títulos en rosa fuerte */
        font-weight: bold;
        margin-bottom: 1rem; /* Espacio debajo del título */
    }

    footer a {
        color: #fff; /* Enlaces en blanco */
        transition: color 0.3s ease; /* Efecto de transición */
        text-decoration: none; /* Sin subrayado */
    }

    footer a:hover {
        color: #ff69b4; /* Cambiar color en hover */
        text-shadow: 0 0 10px #ff69b4; /* Efecto de brillo */
    }

    .footer-icon {
        margin: 0 15px; /* Espaciado horizontal entre íconos */
        color: #ff69b4; /* Color de los íconos en rosa fuerte */
        font-size: 1.5rem; /* Tamaño de los íconos */
        transition: transform 0.3s ease; /* Efecto de transición para el tamaño */
    }

    .footer-icon:hover {
        transform: scale(1.2); /* Efecto de agrandar ícono */
    }

    .footer-links {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap; /* Para que se ajuste en pantallas pequeñas */
        gap: 20px; /* Espaciado entre enlaces */
    }

    .footer-social-icons {
        margin-top: 1rem; /* Espacio superior para los íconos sociales */
    }

    .footer-social-icons a {
        margin: 0 10px;
        color: #ff69b4; /* Rosa fuerte para los íconos sociales */
    }

    .footer-social-icons a:hover {
        color: #ff1493; /* Rosa más intenso al pasar el ratón */
    }
       
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <a class="navbar-brand" >
                    <img src="/AH1.png" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.dashboard') ? 'active' : '' }}" href="{{ route('recepcionista.dashboard') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('citas.index') ? 'active' : '' }}" href="{{ route('citas.index') }}">Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.clientes') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('recepcionista.servicios') ? 'active' : '' }}" href="{{ route('servicios_recepcionista') }}">Servicios</a>
                        </li>
                    </ul>
        
                    <!-- Botón de Cerrar Sesión -->
                    <a href="{{ route('logout') }}" class="nav-link" style="color:white;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> 
                    </a>
        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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

      

        
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('loader');
    
            // Mostrar loader al cambiar de vista
            window.addEventListener('beforeunload', function() {
                loader.style.display = 'flex';
            });
    
            // Ocultar loader una vez que la página ha cargado
            window.addEventListener('load', function() {
                loader.style.display = 'none';
            });
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
