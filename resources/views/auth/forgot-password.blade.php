<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h2 class="text-center text-2xl font-bold text-gray-900 mb-6">Recuperar Contraseña</h2>

        @if (session('status'))
            <div class="text-green-500 text-sm mb-4">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('passwordmail') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-pink-500 text-white py-2 rounded-md hover:bg-pink-400">
                    Enviar enlace de restablecimiento
                </button>
            </div>
        </form>

        <p class="mt-4 text-center text-sm text-gray-500">
            Regresa al <a href="{{ route('login') }}" class="text-pink-500 hover:text-pink-600">inicio de sesión</a>.
        </p>
    </div>
</body>
</html>
