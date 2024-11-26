<!-- resources/views/auth/confirm-password.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h2 class="text-center text-2xl font-bold text-gray-900 mb-4">Confirmar Contraseña</h2>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña Actual</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-pink-400 text-white py-2 rounded-md hover:bg-pink-300">
                    Confirmar Contraseña
                </button>
            </div>
        </form>

        <p class="mt-4 text-center text-sm text-gray-500">
            Regresa al <a href="{{ route('login') }}" class="text-pink-400 hover:text-pink-500">inicio de sesión</a>.
        </p>
    </div>
</body>
</html>
