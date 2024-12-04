<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
    
.layout {
    display: grid;
    grid-template-columns: 15% 85%;
    grid-template-areas: "sidebar body";
    gap: 8px;
    height: 100vh; 
    overflow: hidden; 
}

.sidebar { 
    grid-area: sidebar;
    background-color: black;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    padding: 10px 0;
    height: 100%; 
}

.body { 
    grid-area: body; 
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
}


.btn-container {
    padding: 15px 25px;
    border: unset;
    border-radius: 15px;
    color: #e8e8e8;
    z-index: 1;
    background: #212121;
    position: relative;
    font-weight: bold;
    font-size: 16px;
    box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
    transition: all 250ms;
    overflow: hidden;
    width: 130px;
    text-align: center;
    margin: 10px 0;
}

.btn-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #ffb7c2;
            z-index: -1;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(255, 255, 255, 0.27);
            box-shadow: 4px 8px 19px -3px rgba(255, 255, 255, 0.27);
            transition: all 250ms;
        }

        .btn-container:hover {
            color: #212121;
        }

        .btn-container:hover::before {
            width: 100%;
        }


@media (max-width: 768px) {
    .layout {
        grid-template-columns: 1fr;
        grid-template-areas: 
            "sidebar"
            "body";
        height: auto;
    }

    .sidebar {
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
        height: auto; 
        padding: 10px;
    }

    .btn-container {
        width: 100px;
        font-size: 14px;
        padding: 10px 15px;
        margin: 5px;
    }
}

@media (max-width: 480px) {
    .btn-container {
        width: 80px;
        font-size: 12px;
        padding: 8px 10px;
    }
}

    </style>
    @stack('styles')
</head>
<body>
    <section class="layout">
        <div class="sidebar">
            <a href="{{route('welcome')}}">
                <button class="btn-container">Inicio</button>
                </a>
            <a href="{{route('cliente.citas')}}">
            <button class="btn-container">Mis Cita</button>
            </a>
            <a href="{{route('cliente.perfil')}}">
            <button class="btn-container">Perfil</button>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button class="btn-container">Cerrar Sesión</button>
            </form>
        </div>
        <div class="body">
            @yield('body')
        </div>
    </section>
</body>
</html>
