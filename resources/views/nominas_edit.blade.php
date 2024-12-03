<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nómina</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #000;
            color: #fff;
            padding: 20px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar h1 {
            color: #ff69b4;
            margin: 0;
            font-size: 2rem;
        }

        .container {
            max-width: 900px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            border: 2px solid #000;
        }

        label {
            font-weight: bold;
            color: #000;
        }

        input, select {
            border: 1px solid #000;
        }

        input:focus, select:focus {
            border-color: #ff69b4;
            outline: none;
        }

        .btn {
            border-radius: 5px;
        }

        .btn-success {
            background-color: #000;
            color: #ff69b4;
            border: none;
        }

        .btn-success:hover {
            background-color: #333;
        }

        .btn-secondary {
            background-color: #ff69b4;
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #e052a0;
        }
    </style>
</head>
<body>
    <!-- Barra Superior -->
    <div class="navbar">
        <h1>Editar Nómina para {{ $empleado->name }}</h1>
    </div>

    <div class="container">
        <!-- Formulario para editar la nómina -->
        <form action="{{ route('nominas.update', ['empleado_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="period_start"><i class="fas fa-calendar-alt"></i> Fecha de Inicio</label>
                        <input type="date" id="period_start" name="period_start" class="form-control" value="{{ old('period_start', $nomina->period_start) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="period_end"><i class="fas fa-calendar-check"></i> Fecha de Fin</label>
                        <input type="date" id="period_end" name="period_end" class="form-control" value="{{ old('period_end', $nomina->period_end) }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="total_hours_worked"><i class="fas fa-clock"></i> Horas Trabajadas</label>
                        <input type="number" id="total_hours_worked" name="total_hours_worked" class="form-control" value="{{ old('total_hours_worked', $nomina->total_hours_worked) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="overtime_hours"><i class="fas fa-stopwatch"></i> Horas Extras</label>
                        <input type="number" id="overtime_hours" name="overtime_hours" class="form-control" value="{{ old('overtime_hours', $nomina->overtime_hours) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bonuses"><i class="fas fa-gift"></i> Bonos</label>
                        <input type="number" step="0.01" id="bonuses" name="bonuses" class="form-control" value="{{ old('bonuses', $nomina->bonuses) }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tax"><i class="fas fa-percent"></i> Impuestos</label>
                        <input type="number" step="0.01" id="tax" name="tax" class="form-control" value="{{ old('tax', $nomina->tax) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="net_salary"><i class="fas fa-wallet"></i> Salario Neto</label>
                        <input type="number" step="0.01" id="net_salary" name="net_salary" class="form-control" value="{{ old('net_salary', $nomina->net_salary) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="payment_status"><i class="fas fa-check-circle"></i> Estado de Pago</label>
                        <select id="payment_status" name="payment_status" class="form-control" required>
                            <option value="Pendiente" @if($nomina->payment_status == 'Pendiente') selected @endif>Pendiente</option>
                            <option value="Pagado" @if($nomina->payment_status == 'Pagado') selected @endif>Pagado</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Cambios</button>
                <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Regresar
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
