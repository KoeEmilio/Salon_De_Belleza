<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cargando...</title>
  <style>
    /* Estilos para centrar y ajustar el tamaño del loader */
    /* From Uiverse.io by S4tyendra */ 
.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.container .preloader {
  animation: rotate 2.3s cubic-bezier(0.75, 0, 0.5, 1) infinite;
}

@keyframes rotate {
  50% {
    transform: rotate(360deg);
  }

  100% {
    transform: rotate(720deg);
  }
}

.preloader span {
  --c: #fe889f;
  position: absolute;
  display: block;
  height: 64px;
  width: 64px;
  background: var(--c);
  border: 1px solid var(--c);
  border-radius: 100%;
}

.preloader span:nth-child(1) {
  transform: translate(-28px, -28px);
  animation: shape_1 2.3s cubic-bezier(0.75, 0, 0.5, 1) infinite;
}

@keyframes shape_1 {
  60% {
    transform: scale(0.4);
  }
}

.preloader span:nth-child(2) {
  transform: translate(28px, -28px);
  animation: shape_2 2.3s cubic-bezier(0.75, 0, 0.5, 1) infinite;
}

@keyframes shape_2 {
  40% {
    transform: scale(0.4);
  }
}

.preloader span:nth-child(3) {
  position: relative;
  border-radius: 0px;
  transform: scale(0.98) rotate(-45deg);
  animation: shape_3 2.3s cubic-bezier(0.75, 0, 0.5, 1) infinite;
}

@keyframes shape_3 {
  50% {
    border-radius: 100%;
    transform: scale(0.5) rotate(-45deg);
  }

  100% {
    transform: scale(0.98) rotate(-45deg);
  }
}

.shadow {
  position: relative;
  top: 30px;
  left: 50%;
  transform: translateX(-50%);
  display: block;
  height: 16px;
  width: 64px;
  border-radius: 50%;
  background-color: #ffb7c2;
  border: 1px solid #ffb7c2;
  animation: shadow 2.3s cubic-bezier(0.75, 0, 0.5, 1) infinite;
}

@keyframes shadow {
  50% {
    transform: translateX(-50%) scale(0.5);
    border-color: #f2f2f2;
  }
}

  </style>
</head>
<div class="container">
  <div class="preloader">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="shadow"></div>
</div>


  <script>
    // Redirigir automáticamente después de 7 segundos
    setTimeout(() => {
      window.location.href = "{{ route('paso1') }}"; // Cambia 'agregado' por la ruta a donde quieras redirigir.
    }, 4000);
  </script>
</body>
</html>
