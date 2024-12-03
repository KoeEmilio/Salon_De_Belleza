@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-center">Restablecer Contraseña</h1>
    <form action="{{ route('custom.password.update') }}" method="POST">
        @csrf
        @method('PUT')  <!-- Asegúrate de que sea PUT si tu ruta es PUT -->
        <input type="hidden" name="user" value="{{ $user->id }}">
    
        <label for="password">Nueva Contraseña</label>
        <input id="password" name="password" type="password" required>
    
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required>
    
        <button type="submit">Restablecer Contraseña</button>
    </form>
</div>
@endsection

