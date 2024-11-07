<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <!-- Paso de progreso -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="text-center">
            <div class="rounded-circle bg-secondary text-white py-2 px-3 mb-1">1</div>
            <small>Paso 1<br>Servicio</small>
        </div>
        <div class="flex-grow-1 mx-2 bg-secondary" style="height: 2px;"></div>
        <div class="text-center">
            <div class="rounded-circle bg-warning text-white py-2 px-3 mb-1">2</div>
            <small>Paso 2<br>Datos del Cliente</small>
        </div>
        <div class="flex-grow-1 mx-2 bg-secondary" style="height: 2px;"></div>
        <div class="text-center">
            <div class="rounded-circle bg-secondary text-white py-2 px-3 mb-1">3</div>
            <small>Paso 3<br>Confirmación</small>
        </div>
    </div>

    <!-- Formulario de datos del cliente -->
    <div class="card p-4">
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombres" class="form-label">Nombres(s)*</label>
                    <input type="text" id="nombres" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="apellidos" class="form-label">Apellido(s)*</label>
                    <input type="text" id="apellidos" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Número de Teléfono</label>
                <input type="tel" id="telefono" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning w-100">CONTINUAR</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS (opcional, para funcionalidad adicional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
