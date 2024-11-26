<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fe889f, #ffb7c2 25%, #faccd3 75%, #ffffff);
        }
    </style>
</head>
<body class="h-screen flex items-center justify-center">
<div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl w-full">
    <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mb-4">
        Crea tu cuenta
    </h2>

    <form class="space-y-4" action="{{ route('register.person') }}" method="POST">
        @csrf
        <div class="flex space-x-8">
            <div class="w-1/2">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900">Nombre</label>
                    <input id="name" name="first_name" type="text" maxlength="15" required class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                </div>
    
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-900">Apellido</label>
                    <input id="last_name" name="last_name" type="text" maxlength="20" required 
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" 
                        title="Solo se permiten letras y espacios." 
                        class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                </div>
    
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-900">Edad</label>
                    <input id="age" name="age" type="number" min="18" max="99" required
                    maxlength="2"
                    inputmode="numeric"
                    oninput="if(this.value.length > 2) this.value = this.value.slice(0, 2); this.value = this.value.replace(/[^0-9]/g, '');"
                    title="Ingresa una edad válida entre 18 y 99." 
                    class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                </div>
    
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-900">Género</label>
                    <select id="gender" name="gender" required 
                        class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                    </select>
                </div>
    
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-900">Teléfono</label>
                    <input id="phone" name="phone" type="text" maxlength="10" required 
                    pattern="[0-9]{10}" 
                    inputmode="numeric"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                    title="Ingresa un número de 10 dígitos." 
                    class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">

                </div>
            </div>
    
            <div class="w-1/2">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-900">Nombre de Usuario</label>
                    <input id="username" name="name" type="text" maxlength="15" required class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Correo Electrónico</label>
                    <input id="email" name="email" type="email" required 
                        title="Ingresa un correo electrónico válido." 
                        class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                </div>
    
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Contraseña</label>
                    <input id="password" name="password" type="password" required 
                        minlength="8" 
                        title="La contraseña debe tener al menos 8 caracteres." 
                        class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                </div>
    
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirmar Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                        minlength="8" 
                        title="La contraseña debe tener al menos 8 caracteres." 
                        class="mt-1 block w-full rounded-md py-2 px-3 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-pink-500">
                </div>
            </div>
        </div>
    
        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-pink-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-300 focus:outline focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">Regístrate</button>
        </div>
    </form>
    
    <p class="mt-4 text-center text-sm text-gray-500">
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}" class="font-semibold text-pink-400 hover:text-pink-500">Inicia sesión</a>
    </p>
</div>
</body>
</html>
