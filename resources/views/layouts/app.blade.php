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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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

        .footer {
    background-color: black;
    color: white;
    padding: 8.1rem 0;
}

.footer .titulo h1 {
    color: #EC407A;
    margin: 0;
}

.social-icons a {
    color: #EC407A;
    transition: color 0.3s ease;
}

.social-icons a:hover {
    color: #ffb7c2;
}


.titulo{
    color: #EC407A;
            margin: 0 20px;
            transition: color 0.3s ease;
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
                    <img src="/AH1.png" alt="Logo">
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
                        <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button type="submit" class="btn logout-button">
                    <i class='bx bx-log-out custom-icon-size custom-icon-color'></i>
                    <span class="custom-color-text">Logout</span>
                </button>
            </form>
                    </ul>

                    <!-- Icono de corazón -->
              
              <button class="btn-heart" aria-label="Favoritos" onclick="window.location.href='{{ route('agregado') }}'">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-balloon-heart-fill" viewBox="0 0 16 16">
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

        <!-- Footer -->
        <footer class="footer">
  <div class="container d-flex flex-column align-items-start">
    <!-- Título principal alineado a la izquierda -->
    <div class="titulo mb-4">
      <h1 class="display-4" style="font-weight: bold;">Glow Studio</h1>
    </div>
        <!-- Redes Sociales -->
        <div class="parent">
  <div class="child child-1">
    <button class="button btn-1">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        height="1em"
        viewBox="0 0 512 512"
        fill="#1e90ff"
      >
        <path
          d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
        ></path>
      </svg>
    </button>
  </div>
  <div class="child child-2">
    <button class="button btn-2">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        height="1em"
        viewBox="0 0 448 512"
        fill="#ff00ff"
      >
        <path
          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
        ></path>
      </svg>
    </button>
  </div>
 
  <div class="child child-4">
    
    <button class="button btn-4">
    <a href="https://www.facebook.com/profile.php?id=100016009086910" target="_blank">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        height="1em"
        viewBox="0 0 320 512"
        fill="#4267B2"
      >
        <path
          d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
        ></path>
      </svg>
    </button>
    
  </div>
  <div>
      <h5>Encuéntranos aquí:</h5>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.5198005883517!2d-103.41203772477517!3d25.587638177461706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fda61208a9159%3A0x8297d1b2f4a3236d!2sC.%20Lolo%20de%20M%C3%A9ndez%2065%2C%20Villa%20Florida%2C%2027105%20Torre%C3%B3n%2C%20Coah.!5e0!3m2!1ses-419!2smx!4v1730944164816!5m2!1ses-419!2smx"width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
 
    </div>
</footer>
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
