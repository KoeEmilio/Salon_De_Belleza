<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .contenedor {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 90px;
    }
    .navbar {
        width: 100%;
        height: 100%;
        color: #ffb7c2 ;
    }

    .fondo_personalizado {
        background-color: #000000;
    }
    </style>
</head>
<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado justify-content-center">
            <h1>Bienvenido</h1>
        </nav>
    </div>

    <div class="container">
        @yield('body')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>