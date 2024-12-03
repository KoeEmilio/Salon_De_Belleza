@extends('layouts.recepcionista')

@section('content')
<div class="container">
    <h2 class="text-center" style="color: #fe889f;">Servicios de la Cita</h2>
    
    <h3 style="color: #00000;">Cita de: {{ $cita->owner->first_name }} {{ $cita->owner->last_name }}</h3>
    
<!-- Botón adaptado con efecto gooey -->
<a href="{{ route('service.create', $cita->id) }}" class="c-button c-button--gooey">
  Agregar Servicio
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
<br>
    
    <h4 style="color: #00000;">Servicios actuales:</h4>
    
    <br>
    <table class="table table-bordered">
        <thead style="background-color: #000; color: #fe889f;">
            <tr>
                <th>Servicio</th>
                <th>Duracion</th>
                <th>Cantidad</th>
                <th>Precio servicio</th>               
                <th>Tipo de Cabello</th>
                <th>Precio Adicional por Tipo de Cabello</th>
                <th>Precio Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cita->serviceDetails as $serviceDetail)
                <tr>
                    <td>{{ $serviceDetail->service->service_name }}</td>
                    <td>{{ $serviceDetail->service->duration }}</td>
                    <td>{{ $serviceDetail->quantity }}</td>
                    <td>{{ $serviceDetail->unit_price }}</td>
                    <td>{{ $serviceDetail->hairType->type }}</td>
                    <td>{{ $serviceDetail->hairType->price }}</td>
                    <td>{{ $serviceDetail->total_price }}</td>
                    <td>    

                    <button class="editBtn">
                                        <svg height="1em" viewBox="0 0 512 512">
                                        <a href="{{ route('service.edit', $serviceDetail->id) }}" class="btn btn-warning btn-sm">Editar

                                          <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                          ></path>
                                        </svg>
                                      </button>
                                      </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
   body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
    }

    .table thead {
        background-color: #000;
        color: #fe889f;
    }

    .btn {
        font-weight: bold;
    }

    .btn-warning {
        background-color: #ffb7c2;
        border: 1px solid #fe889f;
    }

    .btn-warning:hover {
        background-color: #fe889f;
        color: #fff;
    }

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

.editBtn:hover::after {
  transform: scaleX(1);
  left: 0px;
  transform-origin: right;
}

/* From Uiverse.io by JaydipPrajapati1910 */ 
.c-button {
  color: #ffb7c2;
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
