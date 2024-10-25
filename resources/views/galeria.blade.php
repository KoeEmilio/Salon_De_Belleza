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
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://www.cortesdepelotendencias.com/wp-content/uploads/2022/07/cortes-de-pelo-mujer-2023-para-caras-cuadradas.jpg" alt="Diseño de Color">
                    <h3>Diseño de Color</h3>
                    <p>Aquí puedes ver mi trabajo en diseño de color</p>
                    <div class="carousel slide" id="carouselColor" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://www.hairstylery.com/wp-content/uploads/images/2-caramel-balayage-on-shiny-black-hair.jpg" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://th.bing.com/th/id/OIP.hF2gh0aOSDgPCrORX_w6CgAAAA?rs=1&pid=ImgDetMain" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/150/00FF00" class="d-block w-100" alt="Imagen 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselColor" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselColor" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://www.cortesdepelotendencias.com/wp-content/uploads/2022/07/cortes-de-pelo-mujer-2023-para-caras-cuadradas.jpg" alt="Diseño de Tipografía">
                    <h3>Diseño de Tipografía</h3>
                    <p>Aquí puedes ver mi trabajo en diseño de tipografía</p>
                    <div class="carousel slide" id="carouselTipografia" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://via.placeholder.com/150" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/150/FF0000" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/150/00FF00" class="d-block w-100" alt="Imagen 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselTipografia" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselTipografia" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://www.cortesdepelotendencias.com/wp-content/uploads/2022/07/cortes-de-pelo-mujer-2023-para-caras-cuadradas.jpg" alt="Diseño de Ilustración">
                    <h3>Diseño de Ilustración</h3>
                    <p>Aquí puedes ver mi trabajo en diseño de ilustración</p>
                    <div class="carousel slide" id="carouselIlustracion" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://via.placeholder.com/150" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/150/FF0000" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/150/00FF00" class="d-block w-100" alt="Imagen 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselIlustracion" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselIlustracion" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
