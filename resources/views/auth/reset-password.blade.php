<form action="{{ route('reset-password.post') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">Correo electrónico</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Nueva contraseña</label>
    <input type="password" id="password" name="password" required>

    <label for="password_confirmation">Confirmar contraseña</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>

    <button type="submit">Restablecer contraseña</button>
</form>
