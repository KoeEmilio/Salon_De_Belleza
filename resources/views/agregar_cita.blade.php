@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <!-- Título pegado directamente encima de la tabla -->
    <h1 class="text-center text-pink mb-4 animate__animated animate__fadeInDown">Agregar Cita</h1>

    <a href="{{ route('citas.index') }}" class="btn btn-outline-secondary mb-4">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>

    <form id="citaForm" action="{{ route('citas.store') }}" method="POST">
        @csrf

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><i class="fas fa-user"></i> Nombre del Cliente</td>
                        <td>
                            <input type="text" id="client_name" name="client_name" class="form-control" required pattern="^[a-zA-Z\s]+$" title="Solo letras y espacios" placeholder="Ingresa el nombre del cliente" value="{{ old('client_name') }}">
                            @error('client_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fas fa-user"></i> Apellido del Cliente</td>
                        <td>
                            <input type="text" id="last_name" name="last_name" class="form-control" required pattern="^[a-zA-Z\s]+$" title="Solo letras y espacios" placeholder="Ingresa el apellido del cliente" value="{{ old('last_name') }}">
                            @error('last_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fas fa-phone"></i> Teléfono</td>
                        <td>
                            <input type="text" id="phone" name="phone" class="form-control" required pattern="^\d{10}$" title="El teléfono debe contener exactamente 10 dígitos" placeholder="Ingresa el teléfono del cliente" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fas fa-birthday-cake"></i> Edad</td>
                        <td>
                            <input type="number" id="age" name="age" class="form-control" min="18" max="120" required placeholder="Ingresa la edad" value="{{ old('age') }}">
                            @error('age')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fas fa-calendar-alt"></i> Fecha de Cita</td>
                        <td>
                            <input type="date" id="appointment_day" name="appointment_day" class="form-control" required min="{{ date('Y-m-d') }}" value="{{ old('appointment_day') }}">
                            @error('appointment_day')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fas fa-clock"></i> Hora de Cita</td>
                        <td>
                            <input type="time" id="appointment_time" name="appointment_time" class="form-control" required value="{{ old('appointment_time') }}">
                            @error('appointment_time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fas fa-cogs"></i> Estado</td>
                        <td>
                            <select id="status" name="status" class="form-control" required>
                                <option value="Pendiente" {{ old('status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="Confirmada" {{ old('status') == 'Confirmada' ? 'selected' : '' }}>Confirmada</option>
                                <option value="Cancelada" {{ old('status') == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fas fa-money-bill-wave"></i> Tipo de Pago</td>
                        <td>
                            <select id="payment_type" name="payment_type" class="form-control" required>
                                <option value="Efectivo" {{ old('payment_type') == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="Transferencia" {{ old('payment_type') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                            </select>
                            @error('payment_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Cita</button>
    </form>
</div>
@endsection
