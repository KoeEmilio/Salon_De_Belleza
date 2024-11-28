<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2d0735, #4d0d5a 25%, #86179c 75%, #cd20f0);
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
<div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full flex flex-col justify-between">
    <div class="flex flex-col items-center">
        <div class="escritura">
            <h1 class="text-3xl font-bold text-gray-800 mb-1">Ingresa tu nueva contraseña!</h1>
        </div>
    </div>

    <form class="space-y-6" action="{{ route('custom.password.update', ['token' => $token]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
            <input id="password" name="password" type="password" autocomplete="new-password" required class="mt-1 block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirmar Contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6">
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-purple-400 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-400">Registrarse</button>
        </div>
    </form>
</div>
</body>
</html>