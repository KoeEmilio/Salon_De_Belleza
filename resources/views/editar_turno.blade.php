<form method="POST" action="{{ route('turnos.update', $employeeHour->id) }}">
    @csrf
    @method('PUT')

    <!-- Campos para la actualización -->
    <label for="start_time">Hora de entrada:</label>
    <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $employeeHour->start_time) }}">

    <label for="end_time">Hora de salida:</label>
    <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $employeeHour->end_time) }}">

    <button type="submit">Actualizar</button>
</form>
