<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h2 class="text-center text-2xl font-bold text-gray-900 mb-6">Restablecer Contraseña</h2>

        <!-- Mostrar errores -->
        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-500 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')  <!-- Este campo simula un método PUT -->
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div>
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div>
                <label for="password">Contraseña nueva</label>
                <input id="password" type="password" name="password" required>
            </div>
            
            <div>
                <label for="password_confirmation">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            
            <div>
                <button type="submit">Restablecer contraseña</button>
            </div>
        </form>
        
        
        
        

        <p class="mt-4 text-center text-sm text-gray-500">
            Regresa al <a href="{{ route('login') }}" class="text-pink-500 hover:text-pink-600">inicio de sesión</a>.
        </p>
    </div>
</body>
</html>
