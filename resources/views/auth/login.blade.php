<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fe889f, #ffb7c2 25%, #faccd3 75%, #ffffff);
        }
        img {
            height: 150px;
            width: 150px;
        }

        .escritura h1 {
            border-right: .15em solid #ff77a9;
            white-space: nowrap;
            overflow: hidden;
            font-family: monospace;
            width: 0;
            animation: escribir 4s steps(40, end), parpadeo-cursor 0.75s;
            animation-fill-mode: forwards; 
        }

        @keyframes escribir {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes parpadeo-cursor {
            from, to { border-color: transparent }
            50% { border-color: #ff77a9 }
        }
    </style>
</head>
<body class="h-screen flex items-center justify-center">
<div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full flex flex-col justify-between">
    <div class="flex flex-col items-center">
        <div class="escritura">
            <h1 class="text-3xl font-bold text-gray-800 mb-1">ALONSO HERNANDEZ</h1>
        </div>
        <div class="escritura" style="animation-delay: 4s;">
            <h1 class="text-2xl font-semibold text-gray-600">SALON & MAKEUP</h1>
        </div>
        <a href="{{ url('/') }}">
            <div>
                <img src="/AH2.png" alt="cont" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
        </a>
    </div>

    <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mb-4 mt-4">
        Inicia sesión en tu cuenta
    </h2>

    <form class="space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Dirección de correo electrónico</label>
            <input id="email" name="email" type="email" autocomplete="email" required class="mt-1 block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required class="mt-1 block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6">
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-pink-400 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-pink-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-400">Iniciar sesión</button>
        </div>
    </form>

    <p class="mt-4 text-center text-sm text-gray-500">
        ¿No eres miembro?
        <a href="{{ route('register') }}" class="font-semibold leading-6 text-pink-400-600 hover:text-pink-500">Regístrate</a>
    </p>

    <!-- Enlace para restablecer la contraseña -->
    <p class="mt-4 text-center text-sm text-gray-500">
        ¿Olvidaste tu contraseña?
        <a href="{{ route('password.request') }}" class="font-semibold leading-6 text-pink-400-600 hover:text-pink-500">Haz clic aquí</a>
    </p>
</div>
</body>
</html>
