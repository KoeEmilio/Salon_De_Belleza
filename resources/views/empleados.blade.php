<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
    <style>
        .fondo_personalizado {
            background-color: #000000;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado justify-content-center">
            <h1 style="color: #ffb7c2">Bienvenido {{$user->name}}</h1>
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button type="submit" class="btn logout-button">
                    <i class='bx bx-log-out custom-icon-size custom-icon-color'></i>
                    <span class="custom-color-text">Logout</span>
                </button>
            </form>
        </nav>
    </div>
</body>
</html>