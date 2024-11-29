@extends('layouts.recepcionista')

@section('content')
<div class="container">
    <h2>Editar Cita</h2>

    <form action="{{ route('appointment.update', $cita->id) }}" method="POST">
        @csrf
        @method('PUT') 


        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $cita->owner->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $cita->owner->last_name }}" required>
        </div>

 
        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $cita->owner->age }}" required>
        </div>

     
        <div class="form-group">
            <label for="gender">Género</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="H" {{ $cita->owner->gender == 'H' ? 'selected' : '' }}>Hombre</option>
                <option value="M" {{ $cita->owner->gender == 'M' ? 'selected' : '' }}>Mujer</option>
            </select>
        </div>

 
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $cita->owner->phone }}" required>
        </div>

    
        <div class="form-group">
            <label for="appointment_day">Fecha de Cita</label>
            <input type="date" name="appointment_day" id="appointment_day" class="form-control" value="{{ $cita->appointment_day }}" required>
        </div>


        <div class="form-group">
            <label for="appointment_time">Hora de la Cita</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" value="{{ $cita->appointment_time }}" required>
        </div>


        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pendiente" {{ $cita->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ $cita->status == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelada" {{ $cita->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>


        <div class="form-group">
            <label for="payment_type">Tipo de Pago</label>
            <select name="payment_type" id="payment_type" class="form-control" required>
                <option value="efectivo" {{ $cita->payment_type == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="transferencia" {{ $cita->payment_type == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Cita</button>
    </form>
</div>
@endsection
