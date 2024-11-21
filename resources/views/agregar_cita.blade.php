    @extends('layouts.recepcionista')

    @section('content')
    <div class="container mt-5">
        <h1 class="text-center text-pink mb-4 animate__animated animate__fadeInDown">Agregar Cita</h1>

        <a href="{{ route('citas.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>

        <form action="{{ route('citas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="client_name">Nombre del Cliente</label>
                <input type="text" class="form-control" id="client_name" name="client_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido del Cliente</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="age">Edad (Opcional)</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="appointment_day">Fecha de la Cita</label>
                <input type="date" class="form-control" id="appointment_day" name="appointment_day" required>
            </div>
            <div class="form-group">
                <label for="appointment_time">Hora de la Cita</label>
                <input type="time" class="form-control" id="appointment_time" name="appointment_time" required>
            </div>
            <div class="form-group">
                <label for="status">Estado de la Cita</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Confirmada">Confirmada</option>
                    <option value="Cancelada">Cancelada</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_type">Tipo de Pago</label>
                <select class="form-control" id="payment_type" name="payment_type" required>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Agregar Cita</button>
        </form>
        
    </div>

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
        body {
            background-color: #f8f9fa;
        }
        .text-pink {
            color: #e91e63;
        }
        .bg-pink {
            background-color: #e91e63;
        }
        .btn-pink {
            background-color: #e91e63;
            border-color: #e91e63;
            color: white;
            font-weight: bold;
        }
        .btn-pink:hover {
            background-color: #d81b60;
        }
        .form-control, .form-select {
            border: 2px solid #e91e63;
            transition: all 0.3s ease;
        }
        .form-control:hover, .form-select:hover {
            box-shadow: 0 0 10px rgba(233, 30, 99, 0.3);
        }
        .form-control:focus, .form-select:focus {
            border-color: #d81b60;
            box-shadow: 0 0 10px rgba(233, 30, 99, 0.3);
        }
        .shadow-lg {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
    @endsection
