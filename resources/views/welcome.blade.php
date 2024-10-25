@extends('layouts.app')

@section('content')
<title>Salón de Belleza</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color:#ffb7c2 ;
      font-family: 'Arial', sans-serif;
      margin: 0;
    }
    .btn-custom {
      background-color: #ffb7c2;
      border: none;
      color: white;
      padding: 15px 30px;
      font-size: 1.2rem;
      border-radius: 30px;
      transition: background-color 0.3s ease-in-out;
    }

    .btn-custom:hover {
      background-color: #fe889f;
    }
    .hero {
      background-color: black;
      height: 70vh;
      margin: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
      overflow: hidden;
      transition: background-color 0.3s ease, opacity 0.5s ease;
      animation: diamond-in-center 1.5s cubic-bezier(.25, 1, .30, 1) both;
    }

    @keyframes diamond-in-center {
      from {
        clip-path: polygon(50% 50%, 50% 50%, 50% 50%, 50% 50%);
      }
      to {
        clip-path: polygon(-50% 50%, 50% -50%, 150% 50%, 50% 150%);
      }
    }

    .hero h1 {
      font-size: 3.5rem;
      opacity: 0;
      transform: translateY(50px);
      animation: slideIn 1s forwards;
      animation-delay: 1s; 
      color: pink;
    }

    @keyframes slideIn {
      0% { opacity: 0; transform: translateY(50px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .second-image-section {
      background-image: url('https://ath2.unileverservices.com/wp-content/uploads/sites/13/2023/05/23214222/color-lila-pastel.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      height: 100vh; 
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .second-image-section h2 {
      font-size: 3rem;
      color: #ffffff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
      opacity: 0;
      transform: translateY(50px);
      animation: fadeInUp 1s forwards;
      animation-delay: 2s; 
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(50px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .image-content-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-start; /* Cambiado a flex-start para alinear los elementos al principio */
        padding: 30px;
        margin: 0;
        gap: 10px;
        background-color: white;
        z-index: 2;
        position: relative;
    }

    .image-content-section .imagen {
        width: 30%;
        height: auto;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        margin-right: 20px;
        position: relative; /* Para poder usarlo en el siguiente ajuste */
    }
    .contenedor {
      width: 40%; 
      padding: 0px;
      border-radius: 15px;
      text-align: left; 
      z-index: 2;
      position: relative;
      opacity: 0;
      transform: translateY(50px);
      animation: fadeInUp 1s forwards;
      animation-delay: 3.5s; 
    }

    .about-section {
      background-color: black;
      color: #E91E63;
      padding: 50px 20px;
      text-align: center;
      border-radius: 20px;
      margin-top: 50px;
      z-index: 1;
    }

    @media (max-width: 768px) {
      .image-content-section {
        flex-direction: column;
        align-items: center;
      }
      .imagen {
        width: 80%; 
        margin-right: 0;
      }
      .contenedor {
        width: 90%; 
      }
    }

    .image-card {
      width: 30%;
      overflow: hidden;
    }

    .image-card img {
      width: 100%;
      transition: transform 0.5s ease;
    }

    .image-card:hover img {
      transform: scale(1.1);
    }

    @keyframes fadeInText {
      0% { opacity: 0; }
      100% { opacity: 3; }
    }

    .Subtitulo {
      color:#E91E63;
    }

    .extra-containers {
      display: flex;
      justify-content: space-around;
      margin: 50px 0;
    }

    .extra-container {
      width: 17%;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .extra-container img {
      width: 100%;
      border-radius: 15px;
    }

  </style>
</head>
<body>

  <!-- Hero Section -->
  <div class="hero" id="hero-section">
    <h1 id="main-text">Glow Studio</h1>
    <h1 id="main-text">La solución integral para Manicuristas</h1>
    <button class="btn-custom">Agendar</button>
  </div><br>

  <!-- Segunda Sección con imagen de fondo fija -->
  <div class="second-image-section">
    <h2>Servicios Profesionales de Belleza</h2>
  </div>

  <!-- Imagen y Contenedor después de la segunda imagen -->
<div class="row image-content-section">
    <div class="col-md-6 col-sm-12 imagen">
        <img src="https://i.pinimg.com/originals/22/fb/1f/22fb1f6a431e5de887697e5739c52c45.jpg" alt="Corte de Cabello" style="width: 100%; height: auto;">
    </div>
    <div class="col-md-6 col-sm-12 contenedor">
        <h1 class="Subtitulo">Bienvenidos a Glow Studio</h1>
        <h3>En Glow Studio, creemos que la belleza es más que una apariencia física; es una experiencia de cuidado personal que eleva la autoestima. Nuestro salón se ha diseñado para que te relajes, rejuvenezcas y embellezcas. Nos especializamos en una amplia gama de tratamientos de belleza, desde cortes de cabello de tendencia hasta servicios de mesoterapia que renovarán tu espíritu.
            <br>
            <br>
            Lo que nos distingue en Glow Studio es nuestra filosofía única. Creemos que la verdadera belleza comienza desde adentro, y nuestro equipo de expertos se dedica no solo a resaltar tu belleza exterior, sino también a ayudarte a sentirte más saludable, relajada y segura por dentro. Cada uno de nuestros tratamientos está cuidadosamente diseñado para ofrecer resultados visibles y duraderos, al mismo tiempo que proporciona una experiencia de relajación y bienestar.</h3>
    </div>
</div>


  <!-- Tres contenedores debajo de la segunda imagen -->
  <div class="extra-containers">
    <div class="extra-container">
      <img src="https://th.bing.com/th/id/OIP.hF2gh0aOSDgPCrORX_w6CgAAAA?rs=1&pid=ImgDetMain" alt="Imagen Extra 1">
      <h3>Diseño de uñas</h3>
      <p>Tus manos son tu carta de presentación, y en Glow Studio nos aseguramos de que siempre luzcan perfectas. Ofrecemos una amplia variedad de servicios de diseño de uñas, desde manicuras clásicas hasta técnicas avanzadas como uñas acrílicas, gelish y decoraciones personalizadas. Nuestro equipo de expertos en diseño de uñas se mantiene al tanto de las últimas tendencias para ofrecerte estilos únicos y creativos que complementen tu personalidad. Ya sea que prefieras un diseño minimalista o algo más atrevido, estamos aquí para hacer realidad tu visión.</p>
    </div>
    <div class="extra-container">
      <img src="https://vailenespanol.com/wp-content/uploads/2021/07/d778417dd70bcc4eafef6504e9d0c107-768x1024.jpg" alt="Imagen Extra 2">
      <h3>Diseño de cabello</h3>
      <p>En Glow Studio, sabemos que tu cabello es una expresión de tu estilo personal, y nuestro equipo de estilistas está comprometido a ofrecerte los mejores servicios de diseño de cabello. Nos especializamos en cortes, peinados y coloraciones que realzan la estructura y la textura de tu cabello. Utilizamos productos de alta gama y técnicas modernas para garantizar resultados duraderos y saludables, ya sea que busques un cambio de look completo o solo un retoque. Cada visita es una experiencia personalizada, donde nos enfocamos en resaltar lo mejor de ti.</p>
    </div>
    <div class="extra-container">
      <img src="https://th.bing.com/th/id/OIP._t4uBxfy70eWImSoTXdECQHaHa?rs=1&pid=ImgDetMain" alt="Imagen Extra 3">
      <h3>Mespterapia</h3>
      <p>La Mesoterapia en Glow Studio es un tratamiento de rejuvenecimiento avanzado que ayuda a revitalizar tu piel desde el interior. A través de la aplicación de microinyecciones con vitaminas, minerales y otros nutrientes, logramos mejorar la elasticidad, la hidratación y el tono de tu piel. Este tratamiento es ideal para combatir el envejecimiento prematuro, reducir la apariencia de manchas y cicatrices, y lograr un aspecto fresco y juvenil. Todo el proceso es realizado por especialistas capacitados, garantizando tu seguridad y los mejores resultados para una piel radiante y saludable..</p>
    </div>
    <div class="extra-container">
      <img src="https://i.pinimg.com/originals/d3/93/e5/d393e5c7d0fe6e7cb90cd7c98bdc1669.jpg" alt="Imagen Extra 1">
      <h3>Maquillaje.</h3>
      <p>En Glow Studio, el arte del maquillaje es una herramienta para resaltar tu belleza natural y permitirte brillar en cada ocasión. Nuestros maquilladores profesionales se especializan en todo tipo de estilos, desde maquillaje natural para el día a día hasta looks glamorosos para eventos especiales. Utilizamos productos de alta calidad que garantizan un acabado impecable y de larga duración, adaptándonos a tus rasgos y preferencias personales para que te sientas única y radiante.</p>
    </div>
    <div class="extra-container">
      <img src="https://i.pinimg.com/originals/d3/93/e5/d393e5c7d0fe6e7cb90cd7c98bdc1669.jpg" alt="Imagen Extra 1">
      <h3>Maquillaje.</h3>
      <p>En Glow Studio, el arte del maquillaje es una herramienta para resaltar tu belleza natural y permitirte brillar en cada ocasión. Nuestros maquilladores profesionales se especializan en todo tipo de estilos, desde maquillaje natural para el día a día hasta looks glamorosos para eventos especiales. Utilizamos productos de alta calidad que garantizan un acabado impecable y de larga duración, adaptándonos a tus rasgos y preferencias personales para que te sientas única y radiante.</p>
    </div>
    <div class="extra-container">
      <img src="https://i.pinimg.com/originals/d3/93/e5/d393e5c7d0fe6e7cb90cd7c98bdc1669.jpg" alt="Imagen Extra 1">
      <h3>Maquillaje.</h3>
      <p>En Glow Studio, el arte del maquillaje es una herramienta para resaltar tu belleza natural y permitirte brillar en cada ocasión. Nuestros maquilladores profesionales se especializan en todo tipo de estilos, desde maquillaje natural para el día a día hasta looks glamorosos para eventos especiales. Utilizamos productos de alta calidad que garantizan un acabado impecable y de larga duración, adaptándonos a tus rasgos y preferencias personales para que te sientas única y radiante.</p>
    </div>
  </div>

  <!-- Sección Sobre Nosotros -->
  <div class="about-section" id="about-us">
    <h2>Sobre Nosotros</h2>
    <p>En nuestro salón de belleza ofrecemos una experiencia única de relajación y embellecimiento...</p>
    <div class="about-icons">
      <i class="fas fa-cut"></i>
      <i class="fas fa-spa"></i>
      <i class="fas fa-paint-brush"></i>
      <i class="fas fa-smile"></i>
    </div>
  </div>

</body>
</html>



@endsection
