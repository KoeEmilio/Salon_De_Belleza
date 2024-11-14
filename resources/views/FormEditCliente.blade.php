<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 80px; 
        }
        .form-container {
            background-color: white; 
            padding: 2rem; 
            border-radius: 15px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            width: 100%;
            height: 95%;
            max-width: 500px; 
            border: black solid 1px;
        }
        .form-title {
            color: #453c5c; 
            margin-bottom: 1rem;
            text-align: center;
        }
        .form-label {
            color: #6c757d; 
        }
        .form-control {
            border-radius: 10px; 
            box-shadow: none; 
            border: 1px solid #ced4da; 
        }
        .form-control:focus {
            border-color: #6610f2; 
            box-shadow: 0 0 0 0.2rem rgba(102, 16, 242, 0.25); 
        }
        .btn-primary {
            background-color: #453c5c; 
            border: none; 
            border-radius: 50px; 
            padding: 0.5rem 1.5rem; 
            width: 100%; 
        }
        .btn-primary:hover {
            background-color: #6610f2; 
        }
        .error-message {
            color: #dc3545; 
            font-size: 0.875rem; 
            margin-top: 0.25rem; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="form-title">Editar Cliente</h1>
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $cliente->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $cliente->email }}" required>
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $cliente->phone }}" required>
                </div>

                <div class="mb-4">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ $cliente->address }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </form>
        </div>
    </div>
</body>
</html>