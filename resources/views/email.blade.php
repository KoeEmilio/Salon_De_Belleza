<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Restablece tu Contraseña</h2>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <button type="submit" class="w-full bg-pink-400 text-white p-2 rounded">Enviar enlace de restablecimiento</button>
            </div>
        </form>
    </div>
</body>
</html>
