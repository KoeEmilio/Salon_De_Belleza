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
            <div class="step-circle bg-active">2</div>
            <small>Agendar</small>
        </div>
        <div class="progress-line mx-2"></div>
        <div class="text-center step">
            <div class="step-circle">3</div>
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

        <!-- Botón para agregar otra cita -->
        <button id="addAppointmentButton" class="btn btn-primary mt-4">Agregar otra cita</button>

        <!-- Contenedor oculto para el formulario -->
        <div id="newAppointmentForm" class="mt-4" style="display: none;">
            <h3>Agendar nueva cita</h3>
            <form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <div class="row">
        <!-- Primera columna -->
        <div class="col-md-6">
            <h5>Servicios Generales</h5>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Maquillaje" id="service1">
                <label class="form-check-label" for="service1">Maquillaje</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Peinado" id="service2">
                <label class="form-check-label" for="service2">Peinado</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Uñas" id="service3">
                <label class="form-check-label" for="service3">Uñas</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Diseño de ceja" id="service4">
                <label class="form-check-label" for="service4">Diseño de ceja</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Corte de dama" id="service5">
                <label class="form-check-label" for="service5">Corte de dama</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Alaciado permanente" id="service6">
                <label class="form-check-label" for="service6">Alaciado permanente</label>
            </div>
        </div>

        <!-- Segunda columna -->
        <div class="col-md-6">
            <h5>Coloración y Paquetes</h5>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Balayage" id="service7">
                <label class="form-check-label" for="service7">Balayage</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Babylights" id="service8">
                <label class="form-check-label" for="service8">Babylights</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Tinte global" id="service9">
                <label class="form-check-label" for="service9">Tinte global</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Mechas tradicionales" id="service10">
                <label class="form-check-label" for="service10">Mechas tradicionales</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Paquetes de XV" id="service11">
                <label class="form-check-label" for="service11">Paquetes de XV</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="services[]" value="Paquete de novias" id="service12">
                <label class="form-check-label" for="service12">Paquete de novias</label>
            </div>
        </div>
    </div>

    <!-- Mesoterapia -->
    <div class="mt-4">
        <h5>Mesoterapia</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Mesoterapia - Piernas" id="service13">
                    <label class="form-check-label" for="service13">Piernas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Mesoterapia - Caderas" id="service14">
                    <label class="form-check-label" for="service14">Caderas</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Mesoterapia - Abdomen" id="service15">
                    <label class="form-check-label" for="service15">Abdomen</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Mesoterapia - Espalda" id="service16">
                    <label class="form-check-label" for="service16">Espalda</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Mesoterapia - Brazos" id="service17">
                    <label class="form-check-label" for="service17">Brazos</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="time">Hora</label>
                    <input type="time" id="time" name="time" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">Guardar nueva cita</button>
</form>

        </div>

        <!-- Botón original para agendar cita -->
        <button class="c-button c-button--gooey mt-4">Agendar Cita
            <div class="c-button__blobs">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </button>
    </div>
</div>


<script>
    // Mostrar el formulario al hacer clic en "Agregar otra cita"
    document.getElementById('addAppointmentButton').addEventListener('click', function() {
        const form = document.getElementById('newAppointmentForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
</script>


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