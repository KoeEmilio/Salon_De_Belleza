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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->

    <!-- Custom Styles -->
    <style>
/* From Uiverse.io by javierBarroso */ 
.parent {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.child {
  width: 50px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  transform-style: preserve-3d;
  transition: all 0.3s cubic-bezier(0.68, 0.85, 0.265, 1.85);
  border-radius: 5px;
  margin: 0 5px;
  box-shadow:
    inset 1px 1px 2px #fff,
    0 0 5px #4442;
}

.child:hover {
  background-color: white;
  background-position:
    -100px 100px,
    -100px 100px;
  /*transform: rotate3d(0.5, 1, 0, 30deg);*/
  transform: perspective(180px) rotateX(60deg) translateY(2px);
}

.child-1:hover {
  box-shadow: 0px 10px 10px #1e90ff;
}
.child-2:hover {
  box-shadow: 0px 10px 10px #ff00ff;
}
.child-3:hover {
  box-shadow: 0px 10px 10px #000;
}
.child-4:hover {
  box-shadow: 0px 10px 10px #4267b2;
}

.button {
  cursor: pointer;
  width: 100%;
  height: 100%;
  border: none;
  background-color: transparent;
  font-size: 20px;
  transition-duration: 0.5s;
  transition-timing-function: cubic-bezier(0.68, -0.85, 0.265, 1.55);
}

.child:hover > .button {
  transform: translate3d(0px, 20px, 30px) perspective(80px) rotateX(-60deg)
    translateY(2px) translateZ(10px);
}



        body, .min-h-screen {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1;
        }
        nav.navbar {
            font-size: 1.2rem;
            padding: 1rem;
            background-color:black;
        }
        nav.navbar a.nav-link, .navbar .btn-heart {
            color: #EC407A;
            margin: 0 20px;
            transition: color 0.3s ease;
        }
        nav.navbar a.nav-link.active, .navbar .btn-heart:hover {
            color:#fff; 
        }
        .navbar-brand img {
            height: 60px; 
        }
        .navbar-nav {
            text-align: center;
            margin: auto;
        }
        .btn-heart {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
        
        .btn-heart.favorito svg {
            fill: red;
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

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

                    <!-- Icono de corazón -->
              
              <button class="btn-heart" aria-label="Favoritos" onclick="window.location.href='{{ route('agregado') }}'">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-balloon-heart-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8.49 10.92C19.412 3.382 11.28-2.387 8 .986 4.719-2.387-3.413 3.382 7.51 10.92l-.234.468a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2 2 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.235-.468ZM6.726 1.269c-1.167-.61-2.8-.142-3.454 1.135-.237.463-.36 1.08-.202 1.85.055.27.467.197.527-.071.285-1.256 1.177-2.462 2.989-2.528.234-.008.348-.278.14-.386"/>
    </svg>
</button>
                    <!-- Icono de usuario -->
                    <a href="{{ route('login') }}" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" width="30" height="30">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        <br>
<br>
<br>
<br>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para el botón de corazón -->
    <script>
        document.getElementById('heartBtn').addEventListener('click', function() {
            this.classList.toggle('favorito'); 
        });
    </script>
</body>
</html>