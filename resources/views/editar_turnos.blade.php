<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Turno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Turno</h2>

        <form action="{{ route('turnos.update', ['id' => $turno->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="day">Día</label>
                <select class="form-control" name="day" id="day" required>
                    <option value="Lunes" {{ $turno->day == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                    <option value="Martes" {{ $turno->day == 'Martes' ? 'selected' : '' }}>Martes</option>
                    <option value="Miércoles" {{ $turno->day == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                    <option value="Jueves" {{ $turno->day == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                    <option value="Viernes" {{ $turno->day == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                    <option value="Sábado" {{ $turno->day == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="shift">Turno</label>
                <select class="form-control" name="shift" id="shift" required>
                    <option value="Mañana" {{ $turno->shift->shift == 'Mañana' ? 'selected' : '' }}>Mañana (8:00 AM - 3:00 PM)</option>
                    <option value="Tarde" {{ $turno->shift->shift == 'Tarde' ? 'selected' : '' }}>Tarde (3:00 PM - 10:00 PM)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="entry_time">Hora de Entrada</label>
                <input type="time" class="form-control" name="entry_time" id="entry_time" value="{{ $turno->shift->entry_time }}" readonly required>
            </div>

            <div class="form-group">
                <label for="exit_time">Hora de Salida</label>
                <input type="time" class="form-control" name="exit_time" id="exit_time" value="{{ $turno->shift->exit_time }}" readonly required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Turno</button>
        </form>
    </div>

    <script>
        // Función que actualiza las horas de entrada y salida según el turno seleccionado
        document.getElementById('shift').addEventListener('change', function() {
            const shift = this.value;
            const entryTime = document.getElementById('entry_time');
            const exitTime = document.getElementById('exit_time');

            if (shift === 'Mañana') {
                entryTime.value = '08:00'; // Hora de entrada para el turno Mañana
                exitTime.value = '15:00'; // Hora de salida para el turno Mañana
            } else if (shift === 'Tarde') {
                entryTime.value = '15:00'; // Hora de entrada para el turno Tarde
                exitTime.value = '22:00'; // Hora de salida para el turno Tarde
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
