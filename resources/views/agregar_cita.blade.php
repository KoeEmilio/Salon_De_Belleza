@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #000000;">Agregar Cita</h2>

    <form action="{{ route('appointment.store') }}" method="POST" class="p-4 shadow-sm rounded" style="background-color: #fff;">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label" style="color: #fe889f;">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" style="border: 2px solid #000000;" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label" style="color: #fe889f;">Apellido</label>
            <input type="text" name="last_name" id="last_name" class="form-control" style="border: 2px solid #000000;" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label" style="color: #fe889f;">Edad</label>
            <input type="number" name="age" id="age" class="form-control" style="border: 2px solid #000000;" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label" style="color: #fe889f;">Género</label>
            <select name="gender" id="gender" class="form-select" style="border: 2px solid #000000;" required>
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label" style="color: #fe889f;">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" style="border: 2px solid #000000;" required>
        </div>

        <div class="mb-3">
            <label for="appointment_day" class="form-label" style="color: #fe889f;">Fecha de Cita</label>
            <input type="date" name="appointment_day" id="appointment_day" class="form-control" style="border: 2px solid #000000;" required>
        </div>

        <div class="mb-3">
            <label for="appointment_time" class="form-label" style="color: #fe889f;">Hora de la Cita</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" style="border: 2px solid #000000;" required>
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label" style="color: #fe889f;">Estado</label>
            <select name="status" id="status" class="form-select" style="border: 2px solid #000000;" required>
                <option value="pendiente">Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_type" class="form-label" style="color: #fe889f;">Tipo de Pago</label>
            <select name="payment_type" id="payment_type" class="form-select" style="border: 2px solid #000000;" required>
                <option value="efectivo">Efectivo</option>
                <option value="transferencia">Transferencia</option>
            </select>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="text-center">
        <button class="btn">
               Guardar Cita
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('appointment.index') }}" class="btn">
                Regresar
            </a>
        </div>
    </form>
</div>

<style>
body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
    }


    .form-control:focus, .form-select:focus {
        border-color: #ffb7c2;
        box-shadow: 0 0 5px rgba(255, 183, 194, 0.5);
    }
    form {
        max-width: 600px;
        margin: 0 auto;
    }

.btn {
  border-right: 1px solid #ff758f;
  border-bottom: 1px solid #ff758f;
  border-top: 1px solid transparent;
  border-left: 1px solid transparent;
  outline: none;
  background: #f8f9fa;
  font-size: 17px;
  padding: 1em 2em;
  border-radius: .5em;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  transition: all .5s;
  z-index: 1;
}

.btn:hover {
  color: #212529;
  border-right: 1px solid transparent;
  border-bottom: 1px solid transparent;
  border-top: 1px solid #ff758f;
  border-left: 1px solid #ff758f;
  box-shadow: 1px 1px 0 #f8f9fa,
             2px 2px 0 #e9ecef,
             3px 3px 0 #fff0f3,
             4px 4px 0 #ffb3c1,
             5px 5px 0 #ff4d6d,
             6px 6px 0 #6c757d,
             7px 7px 0 #a4133c,
             8px 8px 0 #800f2f,
             9px 9px 0 #212529;
}

.btn:active {
  transition: 0s;
  transform: scale(.93);
}

.btn::before,
.btn::after {
  left: 0;
  content: '';
  position: absolute;
  background: #ffccd5;
  z-index: -1;
}

.btn::before {
  width: 0;
  height: 10%;
  transition: width .5s;
}

.btn:hover::before {
  width: 100%;
}

.btn::after {
  width: 100%;
  height: 0;
  border-radius: 100%;
  transition: all .5s .2s;
}

.btn:hover::after {
  height: 100%;
  border-radius: 0;
}

</style>
@endsection
