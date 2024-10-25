@extends('layouts.app')

@section('content')
<title>Galeria de Trabajo</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    .container {
        margin-top: 20px;
    }

    .gallery-item {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 15px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        position: relative;
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        display: block;
    }

    .gallery-item h3 {
        margin-top: 10px;
        font-size: 1.2em;
    }

    .gallery-item p {
        margin-top: 5px;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 3em;
        color: #333;
    }

    .carousel {
        display: none; 
        position: absolute; 
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9); 
        z-index: 10; 
    }

    .gallery-item:hover .carousel {
        display: block; 
    }
</style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>GALERIA DE TRABAJO</h1>
        </div>
        <div class="row">
            @for ($i = 1; $i <= 13; $i++)
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/300" alt="Trabajo {{$i}}">
                        <h3>Diseño de Trabajo {{$i}}</h3>
                        <p>Aquí puedes ver el trabajo de diseño número {{$i}}</p>
                        <div class="carousel slide" id="carousel{{$i}}" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://th.bing.com/th/id/OIP.hF2gh0aOSDgPCrORX_w6CgAAAA?rs=1&pid=ImgDetMain" class="d-block w-100" alt="Imagen 1">
                                    <img src="https://vailenespanol.com/wp-content/uploads/2021/07/d778417dd70bcc4eafef6504e9d0c107-768x1024.jpg" class="d-block w-100" alt="Imagen 1">
                                </div>

                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/300/00FF00" class="d-block w-100" alt="Imagen 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/300/0000FF" class="d-block w-100" alt="Imagen 3">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel{{$i}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel{{$i}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
