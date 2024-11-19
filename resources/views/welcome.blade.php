@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow Studio - Salón de Belleza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
     
        :root {
            --color-principal: #fe889f;
            --color-secundario: #ffb7c2;
            --color-acentuado: #faccd3;
            --color-texto: #4d4d4d;
        }

        body {
            background-color:#F48FB1
            ;
            color: var(--color-texto);
            scroll-behavior: smooth;
        }

        
        .hero {
            background-color:black
            ;
            color: #fff;
            padding: 100px 0;
            text-align: center;
            background-image: url('https://example.com/imagen-glow.jpg');
            background-size: cover;
            background-position: center;
            animation: fadeIn 4s;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.3rem;
            margin-top: 20px;
            animation: fadeInUp 1.5s;
        }

   

      

       
        .services-section {
            background-color: #F48FB1;
            padding: 50px 0;
        }

        .card-service {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-service:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-service img {
            height: 200px;
            object-fit: cover;
        }


        .fixed-background {
    background-image: url('https://colorhaircolor.b-cdn.net/wp-content/uploads/2023/12/pink-hair-color-27.jpg'); /* Usa una imagen de alta resolución */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; 
    filter: brightness(0.9) contrast(1.1); 
    height: 600px; 
    width: 100%;
    image-rendering: -webkit-optimize-contrast; 
}


        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        
        .about-section {
            background-color: #fff;
            padding: 50px 0;
            animation: fadeInLeft 1.5s;
        }
    </style>
</head>
<body>

    <!-- Sección Hero -->
    <section class="hero d-flex align-items-center">
        <div class="container text-center">
            <h1>Bienvenidos a Glow Studio</h1>
            <p>Donde la belleza y el estilo se encuentran</p>
        </div>
    </section>

    <section class="fixed-background"></section>

        <!-- Sección Sobre Nosotros -->
        <section class="about-section" id="about">
        <div class="container text-center">
            <h2 class="mb-4">Sobre Glow Studio</h2>
            <p class="lead">
Glow Studio: Donde la Belleza Encuentra su Brillo ✨

En Glow Studio, creemos que la belleza no es solo una apariencia, sino una experiencia que transforma. Nos especializamos en realzar lo mejor de ti, ofreciendo servicios de alta calidad diseñados para destacar tu estilo y personalidad. <br>  <br>
          Desde cortes de cabello modernos hasta coloraciones vibrantes, maquillaje profesional y tratamientos exclusivos, nuestro equipo de expertos está comprometido a brindarte una atención personalizada en un ambiente cálido y relajante. <br> <br>
          Ubicados en el corazón de la ciudad, en Glow Studio combinamos tendencias internacionales con técnicas innovadoras para garantizar resultados que te harán sentir segura, radiante y única. Nuestro compromiso es ayudarte a brillar, porque tu confianza es nuestra mayor inspiración.

¡Ven a Glow Studio y descubre cómo iluminar tu belleza desde el interior! 💖</p>
           
        </div>
    </section>

    <!-- Sección de Servicios -->
    <section id="servicios" class="services-section">
        <div class="container text-center">
            <h2 class="mb-5">Nuestros Servicios</h2>
            <div class="row">
                <!-- Servicio 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card card-service">
                        <img src="https://i.pinimg.com/originals/3a/da/80/3ada805cfb2ac8e2909dfd442571a1d4.jpg" class="card-img-top" alt="Corte de Cabello">
                        <div class="card-body">
                            <h5 class="card-title">Corte de Cabello</h5>
                            <p class="card-text">Cortes de estilo y tendencia que realzan tu belleza natural.</p>
                        </div>
                    </div>
                </div>
                <!-- Servicio 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card card-service">
                        <img src="https://i.pinimg.com/originals/50/57/05/50570558a6e4ce80f8e117c3d78ca13f.jpg" class="card-img-top" alt="Peinados">
                        <div class="card-body">
                            <h5 class="card-title">Peinados</h5>
                            <p class="card-text">Peinados personalizados para cualquier ocasión especial.</p>
                        </div>
                    </div>
                </div>
                <!-- Servicio 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card card-service">
                        <img src="https://www.somosmamas.com.ar/wp-content/uploads/2020/09/maquillaje-facil-looks.jpg" class="card-img-top" alt="Maquillaje Profesional">
                        <div class="card-body">
                            <h5 class="card-title">Maquillaje Profesional</h5>
                            <p class="card-text">Realza tu belleza con nuestro servicio de maquillaje de alta calidad.</p>
                        </div>
                    </div>
                </div>
                <!-- Servicio 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card card-service">
                        <img src="https://www.clara.es/medio/2023/06/22/unas-rosas-elegantes-con-flores_4f40ac6f_230622202839_1280x1600.jpg" class="card-img-top" alt="Maquillaje Profesional">
                        <div class="card-body">
                            <h5 class="card-title">Diseño de Uñas</h5>
                            <p class="card-text">Dale estilo a tus manos para que luzcan hermosas.</p>
                        </div>
                    </div>
                </div>
                <!-- Servicio 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card card-service">
                        <img src="https://vailenespanol.com/wp-content/uploads/2021/07/d778417dd70bcc4eafef6504e9d0c107-768x1024.jpg" class="card-img-top" alt="Maquillaje Profesional">
                        <div class="card-body">
                            <h5 class="card-title">Tintes de Cabello </h5>
                            <p class="card-text">Realza una nueva imagen donde luzcas brillante con los diferentes tipo de servicios en tinte que tenemos.</p>
                        </div>
                    </div>
                </div>
                <!-- Servicio 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card card-service">
                        <img src="https://th.bing.com/th/id/OIP.PgYk4BukXgMHt8z07kuPnwHaE8?rs=1&pid=ImgDetMain" class="card-img-top" alt="Maquillaje Profesional">
                        <div class="card-body">
                            <h5 class="card-title">Mesoterapia</h5>
                            <p class="card-text">Te ayudamos a tonificar esa grasa acumulada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
