<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <!-- Logo que redirige al dashboard -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo class="h-8 w-auto fill-current text-gray-800" />
        </a>

        <!-- Botón responsive para colapsar el menú en pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Enlace al Dashboard -->
                <li class="nav-item">
                    <x-nav-link class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" :href="route('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>
                <!-- Agrega más elementos de navegación aquí si lo necesitas -->
            </ul>

            <!-- Verificación de autenticación -->
            <div class="d-flex">
                @guest
                    <!-- Mostrar enlaces de login y registro si no está autenticado -->
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        {{ __('Register') }}
                    </a>
                @else
                    <!-- Dropdown para perfil de usuario si está autenticado -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<!-- Estilos personalizados -->
<style>
    .navbar-nav .nav-link {
        font-size: 1.2rem; /* Aumentar tamaño de las letras */
        font-weight: bold;
        color: #000; /* Color de texto predeterminado */
    }

    .navbar-nav .nav-link.active {
        color: #ffc107; /* Color amarillo cuando está activo */
    }

    .navbar-custom .nav-item {
        text-align: center; /* Centra las palabras */
        flex: 1; /* Asegura que cada item ocupe el mismo espacio */
    }

    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    /* Aumenta el tamaño del logo si es necesario */
    .navbar-brand img {
        width: 120px; /* Puedes ajustar el tamaño del logo aquí */
    }

    /* Opcional: ajusta el tamaño del dropdown si lo prefieres */
    .dropdown-menu {
        min-width: 150px;
    }
</style>
