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
            --color-principal: #EC407A;
            --color-secundario: #EC407A;
            --color-acentuado: #faccd3;
            --color-texto:#ffd1d1;
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
        .carousel-caption{
            color: var(--color-texto);
        }
        .divider {
      margin: 20px 0;
      border-top: 5px solid black;
    }
    </style>
</head>
<body>

    <!-- Sección de Galería de Servicios -->
    <section class="gallery-section" id="servicios">
        <div class="container">
            <h2>Nuestro Trabajo</h2>
            <div class="divider"></div>
            <div class="row g-4">
                <!-- Servicio 3: CORTES -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="CORTES" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://formatoapa.com/wp-content/uploads/2020/12/18da7eaadec267fea96a111111db13a9-3.jpg" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://m.media-amazon.com/images/I/61s9tEgrjDL.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/c2/b1/09/c2b109c144b57f1634e69eab70a88f06.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://media.metrolatam.com/2020/11/20/1182636411158284-14a3a1419b7979811ac3a37fc1034677-0x1200.jpg" alt="Uñas 2">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Cortes</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#CORTES" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#CORTES" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Servicio 3: BAYALAGE -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="BAYALAGE" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://content.latest-hairstyles.com/wp-content/uploads/caramel-balayage-on-brown-hair.jpg" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/89/07/54/890754a051f62459330af2f9afbbd0bc.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.squarespace-cdn.com/content/v1/51a00dbce4b0d31a97ad5f09/1616607378129-HEIBH3Z6OF3XHX3IZ1I5/unsplash-image-CIrRI0ujiRo.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/f5/ba/f5/f5baf5bc6adac3ae1fe241248318339b.jpg" alt="Uñas 2">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Balayage</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#BAYALAGE" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#BAYALAGE" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                    <!-- Servicio 3: BAYALAGE -->
                    <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="BABYLIGHTS" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://th.bing.com/th/id/OIP.Eat-rysq3VUj6m8h_d_q6wAAAA?rs=1&pid=ImgDetMain" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/74/f2/e1/74f2e1bf1557a8aa6cd9467fce768213.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://www.thecuttingroom.net.au/uploads/1/3/6/7/13675225/37562869-2257564644270132-3051530841688637440-o_orig.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/736x/0a/48/23/0a4823e5fa647937915fd0a59624e0d9.jpg" alt="Uñas 2">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Babylights</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#BABYLIGHTS" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#BABYLIGHTS" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>


                <!-- Servicio 1: Maquillaje -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="TINTEGLOBAL" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://cdn.shopify.com/s/files/1/0692/4484/6401/files/Disenosintitulo_4_c7aea1ff-11fd-42b9-947a-0f211b044bd6.png?v=1686702554&width=900" alt="Maquillaje 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://th.bing.com/th/id/R.51f798386f4fedf97f022eab9d255f76?rik=Bzr8NTjwB%2fwRfQ&riu=http%3a%2f%2fcdn.shopify.com%2fs%2ffiles%2f1%2f0692%2f4484%2f6401%2ffiles%2fDisenosintitulo_0c2e608c-5fd9-4d0e-8a93-9288d9de3b0e.png%3fv%3d1686702555&ehk=nPOuS8t4NvzWfZu2TUuUytPW4lLr%2bAIsPKNb%2fl5iOuw%3d&risl=&pid=ImgRaw&r=0" alt="Maquillaje 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://leonora-studio.mx/cdn/shop/files/Disenosintitulo_3_59883ca3-624f-469d-9484-48ca086979eb.png?v=1686702555&width=900" alt="Maquillaje 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/2e/60/54/2e6054e4cbb4776a4359cd729d03d893.jpg" alt="Maquillaje 2">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Tinte Global</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#TINTEGLOBAL" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#TINTEGLOBAL" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                
                <!-- Servicio 1: Maquillaje -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="MECHAS" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://i.pinimg.com/736x/5d/f5/60/5df56078406f1d48baca4f5333dafbc0.jpg" alt="Maquillaje 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://th.bing.com/th/id/OIP.kDAtMRlJhuFqBil_bV28QwAAAA?rs=1&pid=ImgDetMain" alt="Maquillaje 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/736x/82/68/b2/8268b26aa8bf2ac768d9d30636785a10.jpg" alt="Maquillaje 2">
                                </div>
                  
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Mechas Tradicionales</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#MECHAS" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#MECHAS" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                 <!-- Servicio 1: Maquillaje -->
                 <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="ALACIADO" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://i.pinimg.com/736x/42/86/5f/42865faf492421413f48f8428cd60881.jpg" alt="Maquillaje 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://mynewhairstyles.net/wp-content/uploads/2022/04/Smokey-Dark-Ash-Blonde-Accent.jpg" alt="Maquillaje 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/a2/37/02/a23702ce11c70f89a4f77c71a5055424.jpg" alt="Maquillaje 2">
                                </div>
                  
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Alaciado Permanente</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#ALACIADO" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#ALACIADO" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Servicio 1: Maquillaje -->
                <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="carouselMaquillaje" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://i.pinimg.com/originals/d8/46/38/d84638a4fe6a7f25ab7193b9edfd96ca.jpg" alt="Maquillaje 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/736x/e5/cc/31/e5cc319dc94930d0541bf3b67c61a509.jpg" alt="Maquillaje 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/736x/d6/a6/e6/d6a6e6b176eee1a78f507b0560d688b4.jpg" alt="Maquillaje 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/736x/14/d5/68/14d5684ea629262efc76845ab61e8ec4.jpg" alt="Maquillaje 2">
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
                                    <img src="https://stayglam.com/wp-content/uploads/2016/04/missysueblog_12299029_138105419890806_1478471715_n.jpg" alt="Peinado 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/37/e8/61/37e861664b71138fcbcba083b48ae161.jpg" alt="Peinado 2">
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
                                    <img src="https://www.khalphora.com/wp-content/uploads/2018/05/64.jpg" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://www.okchicas.com/wp-content/uploads/2019/10/U%C3%B1as-para-manos-grandes.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://gracedgirl.com/wp-content/uploads/2023/03/https___www.instagram.com_p_CocjydPuSRc_-1-1229x1536.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://th.bing.com/th/id/OIP.valGV7hPPTOlpQa-HHRsIQAAAA?rs=1&pid=ImgDetMain" alt="Uñas 2">
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

                <div class="divider"></div>


                 <!-- Servicio 3: CEJA -->
                 <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="CEJA" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://i.pinimg.com/736x/7d/67/ce/7d67ceb3e1b33553cff97a24cbccfcc8.jpg" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://beautifuleyespremium.com/wp-content/uploads/2022/03/cejashenna.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://leonora-studio.mx/cdn/shop/files/Disenosintitulo_09f015ab-457d-4ace-9f5c-008ade6d7dda.png?v=1686720398&width=900" alt="Uñas 2">
                                </div>
                               
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Diseño de Cejas</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#CEJA" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#CEJA" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
                
                      <!-- Servicio 3: Uñas -->
                      <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="PAQUETES" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://i.pinimg.com/736x/5e/30/40/5e3040c5c8137073cd21362e02e09bee.jpg" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/originals/b2/4c/4c/b24c4c13d2a8dfb2c5b3a486355c6456.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://www.okchicas.com/wp-content/uploads/2020/03/Sombras-mate.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://i.pinimg.com/736x/18/5f/e7/185fe7aac76210eb34cfdd73057c9a11.jpg" alt="Uñas 2">
                                </div>
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Paquetes</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#PAQUETES" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#PAQUETES" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>

                 <!-- Servicio 3: Uñas -->
                 <div class="col-md-4">
                    <div class="gallery-item">
                        <div id="MESOTERAPIA" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/m3.jpg" alt="Uñas 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="/m2.jpg" alt="Uñas 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="/m1.jpg" alt="Uñas 2">
                                </div>
                               
                                <!-- Añade más imágenes si es necesario -->
                            </div>
                            <div class="carousel-caption">Mesoterapia</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#MESOTERAPIA" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#MESOTERAPIA" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
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
