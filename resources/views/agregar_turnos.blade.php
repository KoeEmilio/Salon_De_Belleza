<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Turno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Agregar Turno</h3>

        <form action="{{ route('turnos.store') }}" method="POST">
            @csrf

            <div class="form-group">
    <label for="day">Día</label>
    <select class="form-control" name="day" id="day" required>
        <option value="">Selecciona un día</option>
        <option value="Lunes">Lunes</option>
        <option value="Martes">Martes</option>
        <option value="Miércoles">Miércoles</option>
        <option value="Jueves">Jueves</option>
        <option value="Viernes">Viernes</option>
        <option value="Sábado">Sábado</option>
    </select>
</div>
            <div class="form-group">
                <label for="shift">Turno</label>
                <select class="form-control" name="shift" id="shift" required>
                    <option value="">Selecciona un turno</option>
                    <option value="Mañana">Mañana (8:00 AM - 3:00 PM)</option>
                    <option value="Tarde">Tarde (3:00 PM - 10:00 PM)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="entry_time">Hora de Entrada</label>
                <input type="time" class="form-control" name="entry_time" id="entry_time" readonly required>
            </div>

            <div class="form-group">
                <label for="exit_time">Hora de Salida</label>
                <input type="time" class="form-control" name="exit_time" id="exit_time" readonly required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Agregar Turno</button>
            </div>
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
            } else {
                entryTime.value = '';
                exitTime.value = '';
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
