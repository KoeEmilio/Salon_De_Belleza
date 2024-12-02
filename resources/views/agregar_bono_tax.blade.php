<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Bono/Impuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #000;
            color: #ff69b4;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn {
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }

            .btn {
                margin: 5px 0;
                width: 100%;
            }

            .card-text {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.5rem;
                text-align: center;
            }

            .card-title {
                font-size: 1rem;
            }

            .card-text {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('bonos.impuestos', ['nomina_id' => $nomina_id]) }}" class="btn btn-secondary btn-sm mb-4">
        Regresar
    </a>
    

    <h1 class="mb-4 text-center">Agregar Bono/Impuesto</h1>

    <div class="card p-4">
        <form action="{{ route('bonusTaxes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="employee_id" class="form-label">Empleado</label>
                <select id="employee_id" name="employee_id" class="form-select" required>
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}" @if(old('employee_id') == $empleado->id) selected @endif>
                            {{ $empleado->name }}
                        </option>
                    @endforeach
                </select>
                @error('employee_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date_recorded" class="form-label">Fecha</label>
                <input type="date" id="date_recorded" name="date_recorded" class="form-control" required value="{{ old('date_recorded') }}">
                @error('date_recorded')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <select id="type" name="type" class="form-select" required>
                    <option value="Bono" @if(old('type') == 'Bono') selected @endif>Bono</option>
                    <option value="Impuesto" @if(old('type') == 'Impuesto') selected @endif>Impuesto</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Monto</label>
                <input type="number" id="amount" name="amount" class="form-control" required step="0.01" value="{{ old('amount') }}">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar Bono/Impuesto</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
