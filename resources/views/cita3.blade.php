@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- Progreso de pasos -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="text-center step">
            <div class="step-circle ">1</div>
            <small>Servicio</small>
        </div>
        <div class="progress-line mx-2"></div>
        <div class="text-center step">
            <div class="step-circle">2</div>
            <small>Datos del Cliente</small>
        </div>
        <div class="progress-line mx-2"></div>
        <div class="text-center step">
            <div class="step-circle bg-active">3</div>
            <small>Confirmación</small>
        </div>
    </div>

    <div class="confirmation-section">
        <div class="user-info">
            <p class="user-name">DIANA OCHOA</p>
            <p class="user-contact"><i class="fa fa-whatsapp"></i> 871-450-1852</p>
        </div>

        <div class="appointment-info">
            <h2>¡Este es el último paso!</h2>
            <div class="appointment-card">
                <h3>Información de la cita</h3>
                <p><i class="fa fa-calendar"></i> 29 de noviembre 2024</p>
                <h4>Servicios</h4>
                <p>Alaciado Tribeca desde<br><strong>$2999 | 180 minutos</strong></p>
                <p><i class="fa fa-clock"></i> 09:30 - 12:30</p>
                <p><i class="fa fa-user"></i> Milena M</p>
            </div>
        </div>
<button class="c-button c-button--gooey">Agendar Cita
  <div class="c-button__blobs">
  <div></div>
  <div></div>
  <div></div>
  </div>
</button>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: block; height: 0; width: 0;">
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></feColorMatrix>
      <feBlend in="SourceGraphic" in2="goo"></feBlend>
    </filter>
  </defs>
</svg>
    </div>
</div>
<style>
     .calendar-container {
        max-width: 100%;
        margin: auto;
        background: #ffb7c2;
        color: #000;
        padding: 20px;
        border-radius: 10px;
    }
    .progress-line {
        background-color: #333;
        height: 4px;
        flex-grow: 1;
    }
    .step {
        font-size: 1rem;
        color: #333;
    }
    .step-circle {
        font-size: 1.3rem;
        background-color: #ffb7c2;
        color: white;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    .step-circle.bg-active {
        background-color: #ff5c8a;
    }
/* Información del usuario */
.user-info {
    text-align: left;
    margin-bottom: 20px;
    padding: 10px;
    border-left: 4px solid #fe889f;
    background-color: #fef5f8;
    border-radius: 8px;
}

.user-name {
    font-size: 18px;
    font-weight: bold;
    color: #fe889f;
}

.user-contact {
    font-size: 14px;
    color: #666;
}

/* Información de la cita */
.confirmation-section h2 {
    font-size: 20px;
    color: #fe889f;
    margin-bottom: 15px;
}

.appointment-card {
    background-color: #fff;
    border: 1px solid #faccd3;
    border-radius: 8px;
    padding: 15px;
    text-align: left;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.appointment-card h3 {
    font-size: 16px;
    color: #ffb7c2;
    margin-bottom: 10px;
}

.appointment-card p {
    font-size: 14px;
    color: #555;
    margin: 5px 0;
}

.appointment-card strong {
    color: #fe889f;
}

/* Botón de agendar */
.c-button {
  color: #000;
  font-weight: 700;
  font-size: 16px;
  text-decoration: none;
  padding: 0.9em 1.6em;
  cursor: pointer;
  display: inline-block;
  vertical-align: middle;
  position: relative;
  z-index: 1;
}

.c-button--gooey {
  color: #ffb7c2;
  text-transform: uppercase;
  letter-spacing: 2px;
  border: 4px solid #ffb7c2;
  border-radius: 0;
  position: relative;
  transition: all 700ms ease;
}

.c-button--gooey .c-button__blobs {
  height: 100%;
  filter: url(#goo);
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
  bottom: -3px;
  right: -1px;
  z-index: -1;
}

.c-button--gooey .c-button__blobs div {
  background-color: #ffb7c2;
  width: 34%;
  height: 100%;
  border-radius: 100%;
  position: absolute;
  transform: scale(1.4) translateY(125%) translateZ(0);
  transition: all 700ms ease;
}

.c-button--gooey .c-button__blobs div:nth-child(1) {
  left: -5%;
}

.c-button--gooey .c-button__blobs div:nth-child(2) {
  left: 30%;
  transition-delay: 60ms;
}

.c-button--gooey .c-button__blobs div:nth-child(3) {
  left: 66%;
  transition-delay: 25ms;
}

.c-button--gooey:hover {
  color: #fff;
}

.c-button--gooey:hover .c-button__blobs div {
  transform: scale(1.4) translateY(0) translateZ(0);
}
</style>
@endsection