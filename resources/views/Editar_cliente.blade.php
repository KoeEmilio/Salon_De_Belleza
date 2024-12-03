<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edicion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff0f5;
        }
        .card-header {
            background-color: #000000;
            color: #ffb7c2;
            text-align: center;
        }
        .card {
            height: auto; /* Adaptable al contenido */
            width: 100%; 
            max-width: 800px; 
            margin: 20px auto; /* Centrado horizontalmente */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative; /* Contenedor relativo para botones absolutos */
        }
        .card-body {
            padding: 20px; /* Espacio interno para mejor legibilidad */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="my-0">Editar Datos</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.user', $usuario->id) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $usuario->id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $usuario->peopleData->first_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Apellidos</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $usuario->peopleData->last_name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="age">Edad</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{ $usuario->peopleData->age }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Género</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="H" {{ $usuario->peopleData->gender == 'H' ? 'selected' : '' }}>Masculino</option>
                                    <option value="M" {{ $usuario->peopleData->gender == 'M' ? 'selected' : '' }}>Femenino</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $usuario->peopleData->phone }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <select class="form-control" id="role" name="role" required>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}" 
                                            {{ $usuario->roles->pluck('id')->contains($rol->id) ? 'selected' : '' }}>
                                            {{ $rol->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Botón para Guardar Cambios -->
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('clientes_admin') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>