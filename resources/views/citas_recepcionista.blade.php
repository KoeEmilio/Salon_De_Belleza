@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Gestión de Citas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para agregar una nueva cita -->
    <div class="mb-4 text-center">
    <a href="{{ route('appointment.create') }}" class="c-button c-button--gooey">
    Agregar Cita
    <div class="c-button__blobs">
        <div></div>
        <div></div>
        <div></div>
    </div>
</a>
<svg style="display: block; height: 0; width: 0;" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <filter id="goo">
            <feGaussianBlur result="blur" stdDeviation="10" in="SourceGraphic"></feGaussianBlur>
            <feColorMatrix result="goo" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" mode="matrix" in="blur"></feColorMatrix>
            <feBlend in2="goo" in="SourceGraphic"></feBlend>
        </filter>
    </defs>
</svg>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="custom-header">
                <tr>
                    <th>Fecha Registro</th>
                    <th>Fecha Cita</th>
                    <th>Cliente</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Tipo de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->sign_up_date }}</td>
                        <td>{{ $cita->appointment_day }}</td>
                        <td>{{ $cita->owner->first_name ?? 'Sin asignar' }} {{ $cita->owner->last_name ?? 'Sin asignar' }}</td>
                        <td>{{ $cita->appointment_time }}</td>
                        <td>{{ $cita->status }}</td>
                        <td>{{ $cita->payment_type }}</td>
                        <td>
                            <div class="action-buttons">
                                <!-- Ícono de edición -->
                                <a href="{{ route('appointment.edit', $cita->id) }}" class="editBtn">
                                    <svg height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                        </path>
                                    </svg>
                                </a>

                                <!-- Ícono del "ojo" -->
                                <a href="{{ route('service.index', $cita->id) }}" class="container">
                                    <input checked="checked" type="checkbox" disabled>
                                    <div class="checkmark"></div>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Páginas anteriores -->
                @if ($citas->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Anterior</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $citas->previousPageUrl() }}" aria-label="Previous">
                        <i class="fas fa-arrow-left"></i> Anterior
                    </a>
                </li>
                @endif
    
                <!-- Páginas numeradas -->
                @foreach ($citas->getUrlRange(1, $citas->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $citas->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach
    
                <!-- Páginas siguientes -->
                @if ($citas->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $citas->nextPageUrl() }}" aria-label="Next">
                        Siguiente <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
                @else
                <li class="page-item disabled">
                    <span class="page-link">Siguiente</span>
                </li>
                @endif
            </ul>
        </nav>
    </div>
    

</div>

<style>
     /* Paginación */
     .pagination {
            justify-content: center;
        }
        .custom-color-text {
            color: #ffb7c2;
        }
        .custom-icon-size {
            font-size: 48px;
        }
        .custom-icon-color {
            color: #ffb7c2;
        }
        .pagination .page-link {
            border-radius: 50%;
            margin: 0 5px;
        }

        .pagination .page-item.active .page-link {
            background-color: #ffb7c2;
            border-color: #ffb7c2;
        }
/* Encabezado personalizado */
.custom-header {
    background-color: black;
    color: #ffb7c2;
}
.custom-header th {
    color: #ffb7c2;
}

/* Contenedor de botones de acción */
.action-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

/* Botón de edición */
.editBtn {
    width: 50px;
    height: 50px;
    border-radius: 20px;
    border: none;
    background-color: rgb(93, 93, 116);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s;
}
.editBtn::before {
    content: "";
    width: 200%;
    height: 200%;
    background-color: #ffb7c2;
    position: absolute;
    z-index: 1;
    transform: scale(0);
    transition: all 0.3s;
    border-radius: 50%;
    filter: blur(10px);
}
.editBtn:hover::before {
    transform: scale(1);
}
.editBtn:hover {
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.336);
}
.editBtn svg {
    height: 17px;
    fill: white;
    z-index: 3;
    transition: all 0.2s;
    transform-origin: bottom;
}
.editBtn:hover svg {
    transform: rotate(-15deg) translateX(5px);
}

/* Estilo para el ícono del "ojo" */
.viewBtn {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.viewBtn .checkmark {
    position: relative;
    height: 1.4em;
    width: 1.4em;
    border: 2px solid #000000;
    border-radius: 1rem 0rem 1rem;
    transform: rotate(45deg);
    transition: all 0.5s ease-in-out;
}
.viewBtn input:checked ~ .checkmark {
    box-shadow: 0px 0px 40px 5px #ffb7c2;
    background-color: #2195f31f;
}


/* From Uiverse.io by ercnersoy */ 
/* Hide the default checkbox */
.container input {
 position: absolute;
 opacity: 0;
 cursor: pointer;
 height: 0;
 width: 0;
}

.container {
 display: block;
 position: relative;
 cursor: pointer;
 font-size: 20px;
 user-select: none;
}

/* Create a custom checkbox */
.checkmark {
 position: relative;
 top: 0;
 left: 0;
 height: 1.4em;
 width: 1.4em;
 border: 2px solid #000000;
 border-radius: 1rem 0rem 1rem;
 transform: rotate(45deg);
 transition: all .5s ease-in-out;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
 box-shadow: 0px 0px 40px 5px #ffb7c2;
 border-radius: 1rem 0rem 1rem;
 background-color: #2195f31f;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
 content: "";
 position: absolute;
 display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
 display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
 left: 0.35em;
 top: 0.20em;
 width: 0.25em;
 height: 0.5em;
 border: solid #ffb7c2;
 border-width: 0 0.15em 0.15em 0;
 transform: rotate(-5deg);
 animation: upAnimate 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
}

@keyframes upAnimate {
 from {
  transform: translate(-20px, -20px) rotate(-5deg);
  opacity: 0;
 }

 to {
  transform: translate(0, 0) rotate(-5deg);
  opacity: 1;
 }
}



/* From Uiverse.io by JaydipPrajapati1910 */ 
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
  color: black;
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
