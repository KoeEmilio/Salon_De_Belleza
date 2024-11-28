<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nómina</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        h1 i {
            color: #28a745;
            margin-right: 0.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 0.5rem;
        }
        input, select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #28a745;
        }
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            margin-right: 1rem;
            cursor: pointer;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        @media (max-width: 768px) {
            .row {
                display: block;
            }
            .col-md-6, .col-md-4 {
                width: 100%;
                margin-bottom: 1.5rem;
            }
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fa-solid fa-user-edit"></i> Editar Nómina para {{ $empleado->name }}</h1>

        <!-- Formulario para editar la nómina -->
        <form action="{{ route('nominas.update', ['empleado_id' => $empleado->id, 'nomina_id' => $nomina->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="period_start"><i class="fa-solid fa-calendar-alt"></i> Fecha de Inicio</label>
                        <input type="date" id="period_start" name="period_start" value="{{ old('period_start', $nomina->period_start) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="period_end"><i class="fa-solid fa-calendar-check"></i> Fecha de Fin</label>
                        <input type="date" id="period_end" name="period_end" value="{{ old('period_end', $nomina->period_end) }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="total_hours_worked"><i class="fa-solid fa-clock"></i> Horas Trabajadas</label>
                        <input type="text" id="total_hours_worked" name="total_hours_worked" value="{{ old('total_hours_worked', $nomina->total_hours_worked) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="overtime_hours"><i class="fa-solid fa-stopwatch"></i> Horas Extras</label>
                        <input type="number" id="overtime_hours" name="overtime_hours" value="{{ old('overtime_hours', $nomina->overtime_hours) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bonuses"><i class="fa-solid fa-money-bill-wave"></i> Bonos</label>
                        <input type="number" step="0.01" id="bonuses" name="bonuses" value="{{ old('bonuses', $nomina->bonuses) }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tax"><i class="fa-solid fa-percent"></i> Impuestos</label>
                        <input type="number" step="0.01" id="tax" name="tax" value="{{ old('tax', $nomina->tax) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="net_salary"><i class="fa-solid fa-wallet"></i> Salario Neto</label>
                        <input type="number" step="0.01" id="net_salary" name="net_salary" value="{{ old('net_salary', $nomina->net_salary) }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="payment_status"><i class="fa-solid fa-toggle-on"></i> Estado de Pago</label>
                        <select id="payment_status" name="payment_status" required>
                            <option value="Pendiente" @if($nomina->payment_status == 'Pendiente') selected @endif>Pendiente</option>
                            <option value="Pagado" @if($nomina->payment_status == 'Pagado') selected @endif>Pagado</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-save"></i> Guardar Cambios</button>
                <a href="{{ route('nominas.index', ['empleado_id' => $empleado->id]) }}" class="btn btn-secondary btn-sm back-btn">Regresar</a>            </div>
        </form>
    </div>
</body>
</html>
