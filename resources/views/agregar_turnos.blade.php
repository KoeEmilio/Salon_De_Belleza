<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 40px;
            background-color: #fff;
            padding: 5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        h3 {
            color: #ff69b4; /* Rosa para el encabezado */
            text-align: center;
        }

        .btn {
            border-radius: 5px;
        }

        /* Estilo del botón "Agregar Turno" negro con texto rosa */
        .btn-primary {
            background-color: #000;
            border-color: #000;
            color: #ff69b4;
        }

        .btn-primary i {
            color: #ff69b4;
        }

        /* Estilo de los botones */
        .btn-secondary {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }

        /* Estilo de las etiquetas y campos de entrada */
        .form-control {
            border-radius: 5px;
            border-color: #ccc;
        }

        .form-group label {
            color: #333;
        }

        /* Estilos adicionales */
        .form-group select {
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
    </style>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
