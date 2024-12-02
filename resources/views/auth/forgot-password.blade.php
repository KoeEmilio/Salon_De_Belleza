<form action="{{ route('forgot-password.post') }}" method="POST">
    @csrf
    <label for="email">Correo electrónico</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Enviar enlace</button>
</form>