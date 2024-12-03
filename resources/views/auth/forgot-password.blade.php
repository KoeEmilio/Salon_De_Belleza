@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-center">¿Olvidaste tu contraseña?</h1>
    <form action="{{ route('custom.password.email') }}" method="POST">
        @csrf
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Enviar enlace</button>
    </form>
    
</div>
@endsection
