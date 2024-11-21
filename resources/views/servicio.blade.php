@extends('layouts.app')

@section('content')
<title>Servicios</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #faccd3; 
  }
  .card-title{
    color:#fe889f;
  }
  .divider {
      margin: 20px 0;
      border-top: 5px solid black;
    }
  .servicio-titulo {
    font-size: 40px;
    margin-bottom: 10px;
  }
  .subtitulo {
    font-size: 18px;
    margin-bottom: 20px;
  }
  .card {
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
  }
  .card img {
    height: 400px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  .card:hover img {
    transform: scale(1.1);
  }
  .card-body {
    position: relative;
    z-index: 2;
  }
  .description-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); 
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
  }
  .card:hover .description-overlay {
    opacity: 1; 
  }
</style>
<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="confirmationModalLabel">Servicio Agregado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <i class="bi bi-check-circle-fill text-success" style="font-size: 2rem;"></i>
        <p class="mt-3">¡El servicio ha sido agregado exitosamente a tu lista!</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="text-center">
    <br>
    <h1 class="servicio-titulo">SERVICIOS</h1>
    <p class="subtitulo">Es hora de darle un poco de amor a tu cabello</p>
  </div>
  <div class="divider"></div>

  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="https://www.cortesdepelotendencias.com/wp-content/uploads/2022/07/cortes-de-pelo-mujer-2023-para-caras-cuadradas.jpg" class="card-img-top" alt="Corte de Cabello">
        <div class="description-overlay">
          <p>Corte de cabello profesional para todo tipo de rostro.<br>
            (El presio puede variar dependiendo de la cantidad de cabello.)
          </p>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">CORTES</h5>
          <h5 class="card-title">$150</h5>
          <button class="btn btn-outline-dark agregar-servicio" data-bs-toggle="modal" data-bs-target="#confirmationModal">+ Agregar servicio</button>
         
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="https://www.hairstylery.com/wp-content/uploads/images/2-caramel-balayage-on-shiny-black-hair.jpg" class="card-img-top" alt="Balayage">
        <div class="description-overlay">
          <p>Técnica de balayage para un look natural y brillante.<br>
          (El presio puede variar dependiendo de la cantidad de cabello.)</p>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">BALAYAGE</h5>
          <h5 class="card-title">$2,000</h5>
          <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="https://th.bing.com/th/id/R.16e9603ac3d99e1c57e6eb84676b55db?rik=TXvb%2fmouMzYtNA&pid=ImgRaw&r=0" class="card-img-top" alt="Babylights">
        <div class="description-overlay">
          <p>Babylights para un brillo sutil y juvenil en tu cabello.
          <br>
          (El presio puede variar dependiendo de la cantidad de cabello.)
          </p>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">BABYLIGHTS</h5>
          <h5 class="card-title">$1,000</h5>
          <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
        </div>
      </div>
    </div>

    <!-- Segunda fila -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://cdn.shopify.com/s/files/1/0692/4484/6401/files/Disenosintitulo_11_68a159ae-1a21-4e54-a635-9b55fb0d640b.png?v=1686702556&width=900" class="card-img-top" alt="Tinte Global">
          <div class="description-overlay">
            <p>Tinte global para un color intenso y duradero.
            <br>
            (El presio puede variar dependiendo de la cantidad de cabello.)
            </p>
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">TINTE GLOBAL</h5>
            <h5 class="card-title">$3,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="https://i.pinimg.com/736x/06/19/63/061963f192d606683acbd3a9f5c2eeba.jpg" class="card-img-top" alt="Mechas Tradicionales">
          <div class="description-overlay">
            <p>Mechas tradicionales para dar luz y dimensión al cabello. <br>
            (El presio puede variar dependiendo de la cantidad de cabello.)</p>
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">MECHAS TRADICIONALES</h5>
            <h5 class="card-title">$2,500</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="https://hair.montibello.com/wp-content/uploads/2022/09/ALISADO-PERMANENTE-CON-QUERATINA-PASO-A-PASO-scaled.jpg" class="card-img-top" alt="Alaciado Permanente">
          <div class="description-overlay">
            <p>Alisado permanente para un cabello suave y lacio.
            <br>
            (El presio puede variar dependiendo de la cantidad de cabello.)
            </p>
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">ALACIADO PERMANENTE</h5>
            <h5 class="card-title">$500</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
    </div>

    
    <div class="divider"></div>

    <!-- Tercera fila -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://i.pinimg.com/736x/6c/99/fe/6c99fe9b0bf9df224d07fac21501f4cc.jpg" class="card-img-top" alt="Maquillaje">
          <div class="description-overlay">
            <p>Maquillaje profesional para cualquier ocasión.<br> (El precio puede variar dependiendo del tipo de maquillaje)</p>
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">MAQUILLAJE</h5>
            <h5 class="card-title">$1,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="https://estaticos-cdn.prensaiberica.es/clip/4a24f383-e1a9-46eb-8237-5d76abdfff82_woman-libre-1200_default_0.jpg" class="card-img-top" alt="Peinados">
          <div class="description-overlay">
            <p>Peinados elegantes para eventos especiales.</p>
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">PEINADOS</h5>
            <h5 class="card-title">$700</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="https://mujersaludable10.com/wp-content/uploads/2022/09/293485004_1648884595498499_1408346630619025824_n-1024x1024.jpg" class="card-img-top" alt="Diseño de Uñas">
          <div class="description-overlay">
            <p>Diseño de uñas creativas y personalizadas.<br>(El presio puede variar dependiendo del diseño de uñas escogido)</p>
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">DISEÑO DE UÑAS</h5>
            <h5 class="card-title">$500</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
    </div>
   
    <!--Cuarta fila -->
  <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://th.bing.com/th/id/OIP.F2uEKBcrcqnseFPBj1XoVgHaEj?rs=1&pid=ImgDetMain" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>El diseño de cejas es un proceso estético que busca dar forma y definir las cejas para realzar la expresión facial y armonizar las características del rostro. Este procedimiento puede variar en técnica y estilo, dependiendo de las preferencias personales y la forma del rostro de cada individuo.
            <br> (El presio de puede variar dependiendo del diseño de ceja)
          </p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">DISEÑO DE CEJA</h5>
            <h5 class="card-title">$1,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card">
          <img src="https://th.bing.com/th/id/OIP.X_PGaGfAMBUoUjDbtFkDnQAAAA?rs=1&pid=ImgDetMain" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>Incluye los siguientes servicios: <br>-Prueba de maquillaje <br>-Prueba de peinado <br>-Maquillaje para el dia del evento<br>-Peinado para el dia del evento  <br>-Facial hidratante.
        <br><br>(El presio puede variar dependiendo de si quieren agregar otro servicio )</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">PAQUETE DE XV</h5>
            <h5 class="card-title">$5,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
     
      <div class="col-md-4">
        <div class="card">
          <img src="https://marielenamakeup.com/wp-content/uploads/2023/02/Maquillaje-de-Novia-Elegante.jpg" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>Incluye los siguientes servicios: <br>-Prueba de maquillaje <br>-Prueba de peinado <br>-Maquillaje para el dia del evento<br>-Peinado para el dia del evento  <br>-Facial hidratante.
          <br><br>(El presio puede variar dependiendo de si quieren agregar otro servicio )</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">PAQUETE DE NOVIA</h5>
            <h5 class="card-title">$5,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>

      <div class="divider"></div>

      <div class="text-center">
      <h1 class="servicio-titulo">MESOTERAPIA</h1>
      
      <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://pielbella.pe/wp-content/uploads/2022/07/mesoterapia-abdomen-768x511.jpg" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>La mesoterapia abdominal se utiliza para reducir la grasa localizada y mejorar la apariencia de la piel. Consiste en la inyección de una combinación de medicamentos, vitaminas y minerales directamente en la capa media de la piel. Este tratamiento ayuda a disolver los depósitos de grasa, mejora la circulación sanguínea y promueve la elasticidad de la piel, contribuyendo a un abdomen más firme y tonificado.<br> <br>(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">ABDOMEN</h5>
            <h5 class="card-title">$2,708</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card">
          <img src="https://supremeaesthetics.co.za/wp-content/uploads/2023/12/Copy-of-Supreme-Aesthetics-Social-2.jpg" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>La mesoterapia en las caderas se centra en disminuir la grasa localizada y mejorar la apariencia de la piel en esta área. Las soluciones inyectadas ayudan a romper los depósitos de grasa y a reducir la celulitis, favoreciendo una silueta más esbelta y suave. Además, mejora la elasticidad y firmeza de la piel.<br><br>(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">CADERAS</h5>
            <h5 class="card-title">$1,500</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
     
      <div class="col-md-4">
        <div class="card">
          <img src="https://agelessskinrejuvenation.com/wp-content/uploads/2022/11/lipoplex-2-1024x683.jpg" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>Este tratamiento se aplica en los brazos para reducir la grasa localizada y mejorar la flacidez. A través de inyecciones específicas, se estimula la microcirculación y se promueve la eliminación de toxinas. La mesoterapia ayuda a tonificar los músculos, logrando brazos más esculpidos y firmes.<br><br>(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">BRAZOS</h5>
            <h5 class="card-title">$2,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://www.centromargarcia.com/wp-content/uploads/2023/01/mesoterapia-cuando-hace-efecto.jpg" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>La mesoterapia facial se utiliza para rejuvenecer y revitalizar la piel del rostro. Las inyecciones de nutrientes, antioxidantes y ácido hialurónico ayudan a mejorar la hidratación, elasticidad y luminosidad de la piel. Este tratamiento reduce las arrugas, las líneas de expresión y mejora la apariencia general del rostro, otorgándole un aspecto más fresco y juvenil.<br><br>(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">ROSTRO</h5>
            <h5 class="card-title">$1,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card">
          <img src="https://www.eatthis.com/wp-content/uploads/sites/4/2023/07/botox-in-neck.jpg?quality=82&strip=all&w=640" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>La mesoterapia en el cuello se enfoca en combatir la flacidez y las arrugas. Se inyectan soluciones que estimulan la producción de colágeno y elastina, mejorando la textura y el tono de la piel. Este tratamiento ayuda a eliminar las toxinas, reducir la papada y mejorar la hidratación de la piel, logrando un cuello más suave y rejuvenecido.<br><br>(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">CUELLO</h5>
            <h5 class="card-title">$2,500</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
     
      <div class="col-md-4">
        <div class="card">
          <img src="https://th.bing.com/th/id/R.dcdec5b80daa1c6788a7dfe19dc7f518?rik=9MMQuhFkY4fX%2fg&riu=http%3a%2f%2fdralourdesaloy.com%2fwp-content%2fuploads%2f2022%2f04%2fmesoterapia-1.jpg&ehk=fCVGYd%2bMTI5nsNOn9FwZ20%2fnGgXddAnAOr13XLIhqnk%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="Corte de Cabello">
          <div class="description-overlay">
          <p>La mesoterapia en los glúteos se utiliza para tonificar y dar forma a esta área. Las inyecciones ayudan a reducir la celulitis, mejorar la circulación y aumentar la firmeza de la piel. Además, puede incluir ingredientes que favorecen el aumento de volumen, logrando glúteos más definidos y estéticamente agradables.<br><br>(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)</p>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">GLUTEOS</h5>
            <h5 class="card-title">$3,000</h5>
            <button class="btn btn-outline-dark agregar-servicio">+ Agregar servicio</button>
          </div>
        </div>
      </div>
</div>
<script>
  document.querySelectorAll('.agregar-servicio').forEach((button, index) => {
    button.addEventListener('click', () => {
      const servicio = button.closest('.card').querySelector('.card-title').textContent.trim();
      const servicios = JSON.parse(localStorage.getItem('serviciosAgregados')) || [];

      servicios.push(servicio);
      localStorage.setItem('serviciosAgregados', JSON.stringify(servicios));
      
      alert(`${servicio} se ha agregado a la lista de servicios`);
    });
  });


   
</script>

@endsection