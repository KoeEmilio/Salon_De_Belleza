<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Servicio</title>
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
            height: auto;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="my-0">Registrar Servicio</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('servicios.update', $servicio->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="service_name">Nombre del Servicio</label>
                                <input type="text" class="form-control" id="service_name" name="service_name" value="{{$servicio->service_name}}" required maxlength="30">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{$servicio->price}}" required min="0" step="0.01">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$servicio->description}}"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="duration">Duración</label>
                                <input type="text" class="form-control" id="duration" value="{{$servicio->duration}}" name="duration" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <input type="text" class="form-control" id="type" name="type"value="{{$servicio->service_name}}" required maxlength="30">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Registrar Servicio</button>
                        <a href="{{ route('servicios_admin') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
