@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow Studio - Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Colores personalizados */
        :root {
            --color-principal: #fe889f;
            --color-secundario: #ffb7c2;
            --color-acentuado: #faccd3;
            --color-texto: #4d4d4d;
        }

        body {
            background-color: var(--color-acentuado);
            color: var(--color-texto);
            scroll-behavior: smooth;
        }

        /* Estilo de la galería */
        .gallery-section {
            padding: 50px 0;
            text-align: center;
        }

        .gallery-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--color-principal);
        }

        .gallery-item {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <!-- Sección de Galería de Servicios -->
    <section class="gallery-section" id="servicios">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <div class="row g-4">
                <!-- Servicio 1: Maquillaje -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="carouselMaquillaje" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://example.com/maquillaje1.jpg" alt="Maquillaje 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://example.com/maquillaje2.jpg" alt="Maquillaje 2">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Maquillaje</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselMaquillaje" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselMaquillaje" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Servicio 2: Peinado -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="carouselPeinado" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://i.pinimg.com/originals/50/57/05/50570558a6e4ce80f8e117c3d78ca13f.jpg" alt="Peinado 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://hairstyles-galaxy.com/wp-content/uploads/2015/12/curly-braided-updo-2016.png" alt="Peinado 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://www.weddingforward.com/wp-content/uploads/2022/02/elegant-wedding-hairstyles-simple-half-up-on-long-hair-melissaclaremakeup-400x500.jpg" alt="Peinado 3">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Peinado</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPeinado" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselPeinado" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Añade más servicios según sea necesario, usando la misma estructura de carrusel -->
                <!-- Servicio 3: Uñas -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="carouselUnas" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://example.com/unas1.jpg" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://example.com/unas2.jpg" alt="Uñas 2">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Uñas</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselUnas" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselUnas" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Puedes continuar agregando más servicios como Diseño de Ceja, Corte de Dama, etc. -->

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
