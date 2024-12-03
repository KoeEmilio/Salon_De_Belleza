<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        h2 {
            color: #ff69b4; /* Rosa para el encabezado */
            text-align: center;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #000;
            border-color: #000;
            color: #ff69b4;
        }

        .btn-primary i {
            color: #ff69b4;
        }

        .form-control {
            border-radius: 5px;
            border-color: #ccc;
        }

        .form-group label {
            color: #333;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #000;
            border-color: #000;
            color: #ff69b4;
            border-radius: 5px;
        }

        .form-group button:hover {
            background-color: #ff69b4;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
