@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-pink-500 mb-6">Restablecer Contraseña</h1>

    <form action="{{ route('custom.password.update') }}" method="POST" class="max-w-md mx-auto bg-black p-8 rounded-lg shadow-lg">
        @csrf
        @method('PUT')  
        <input type="hidden" name="user" value="{{ $user->id }}">
    
        <div class="mb-4">
            <label for="password" class="block text-white mb-2">Nueva Contraseña</label>
            <input id="password" name="password" type="password" class="w-full p-3 border-2 border-pink-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>
    
        <div class="mb-4">
            <label for="password_confirmation" class="block text-white mb-2">Confirmar Contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="w-full p-3 border-2 border-pink-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>
    
        <button type="submit" class="w-full py-3 bg-pink-500 text-white font-bold rounded-lg hover:bg-pink-600 transition duration-300">Restablecer Contraseña</button>
    </form>
</div>
@endsection

<style>
    /* Fondo de la página */
    body {
        background-color: #1a1a1a;
        color: white;
        font-family: 'Arial', sans-serif;
    }

    /* Botón de envío */
    button {
        background-color: #F06292; /* Rosa */
        color: white;
        font-weight: bold;
        border: none;
        padding: 1em;
        width: 100%;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #E91E63; /* Rosa más fuerte */
    }

    /* Inputs de formulario */
    input {
        background-color: #333;
        color: white;
        padding: 1em;
        border-radius: 5px;
        width: 100%;
        border: 2px solid #F06292;
        transition: border-color 0.3s;
    }

    input:focus {
        border-color: #E91E63;
    }

    /* Etiquetas */
    label {
        color: #F06292;
        font-weight: bold;
    }

    /* Fondo de formulario */
    form {
        background-color: #000;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
