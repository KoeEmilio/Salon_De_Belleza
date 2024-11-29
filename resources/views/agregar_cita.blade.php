@extends('layouts.recepcionista')

@section('content')
<div class="container">
    <h2>Agregar Cita</h2>

    <form action="{{ route('appointment.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>


        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gender">Género</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>



        <div class="form-group">
            <label for="appointment_day">Fecha de Cita</label>
            <input type="date" name="appointment_day" id="appointment_day" class="form-control" required>
        </div>

 
        <div class="form-group">
            <label for="appointment_time">Hora de la Cita</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
        </div>

  
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pendiente">Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

  
        <div class="form-group">
            <label for="payment_type">Tipo de Pago</label>
            <select name="payment_type" id="payment_type" class="form-control" required>
                <option value="efectivo">Efectivo</option>
                <option value="transferencia">Transferencia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Cita</button>
    </form>
</div>
@endsection
