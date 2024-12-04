@extends('layouts.recepcionista')

@section('content')
<div class="container" style="background-color: #f8f0f6; padding: 20px; border-radius: 8px;">
    <h2 class="text-center" style="color: #ff4d88;">Editar Servicio a la Cita</h2>

    <h3 style="color: #333;">Cita de: {{ $cita->owner->first_name }} {{ $cita->owner->last_name }}</h3>
    <form action="{{ route('service.update', ['appointmentId' => $cita->id, 'serviceDetailId' => $serviceDetail->id]) }}" method="POST" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        @csrf
        @method('PUT')

        <!-- Selección del Servicio -->
        <select name="service_id" id="service_id" class="form-control" required onchange="updatePriceAndDuration()">
            <option value="">Selecciona un servicio</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}" data-price="{{ $service->price }}" data-duration="{{ $service->duration }}" {{ $serviceDetail->service_id == $service->id ? 'selected' : '' }}>
                    {{ $service->service_name }}
                </option>
            @endforeach
        </select>

        <!-- Selección del Tipo de Cabello -->
        <div class="form-group">
            <label for="hair_type_id" style="color: #ff4d88;">Tipo de Cabello</label>
            <select name="hair_type_id" id="hair_type_id" class="form-control" required onchange="updatePriceAndDuration()" style="background-color: #f1f1f1;">
                <option value="">Selecciona un tipo de cabello</option>
                @foreach ($hairTypes as $hairType)
                    <option value="{{ $hairType->id }}" data-price="{{ $hairType->price }}" {{ $serviceDetail->hair_type_id == $hairType->id ? 'selected' : '' }}>
                        {{ $hairType->type }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Precio Unitario -->
        <div class="form-group">
            <label for="unit_price" style="color: #ff4d88;">Precio del Servicio</label>
            <input type="number" name="unit_price" id="unit_price" class="form-control" value="{{ old('unit_price', $serviceDetail->unit_price) }}" required readonly style="background-color: #f1f1f1;">
        </div>

        <!-- Precio Adicional por Tipo de Cabello -->
        <div class="form-group">
            <label for="hair_extra_price" style="color: #ff4d88;">Precio Adicional por Tipo de Cabello</label>
            <input type="number" name="hair_extra_price" id="hair_extra_price" class="form-control" value="{{ old('hair_extra_price', $serviceDetail->hair_extra_price) }}" readonly style="background-color: #f1f1f1;">
        </div>

        <!-- Duración del Servicio -->
        <div class="form-group">
            <label for="duration" style="color: #ff4d88;">Duración del Servicio</label>
            <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $serviceDetail->duration) }}" readonly style="background-color: #f1f1f1;">
        </div>

        <!-- Cantidad -->
        <div class="form-group">
            <label for="quantity" style="color: #ff4d88;">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $serviceDetail->quantity) }}" required onchange="updatePriceAndDuration()" style="background-color: #f1f1f1;">
        </div>

        <!-- Precio Total -->
        <div class="form-group">
            <label for="total_price" style="color: #ff4d88;">Precio Total</label>
            <input type="number" name="total_price" id="total_price" class="form-control" value="{{ old('total_price', $serviceDetail->total_price) }}" readonly style="background-color: #f1f1f1;">
        </div>

        <!-- Botones de Acción -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3">
            <a href="{{ route('service.index', ['appointmentId' => $cita->id]) }}" class="btn action-btn w-100 w-md-50 py-2">
                Regresar
            </a>
            <button type="submit" class="btn action-btn w-100 w-md-50 py-2">Actualizar Servicio</button>
        </div>
    </form>

    <script>
        function updatePriceAndDuration() {
            var servicePrice = parseFloat(document.getElementById("service_id").selectedOptions[0].getAttribute("data-price")) || 0;
            var serviceDuration = document.getElementById("service_id").selectedOptions[0].getAttribute("data-duration") || '0';
            var hairPrice = parseFloat(document.getElementById("hair_type_id").selectedOptions[0].getAttribute("data-price")) || 0;
            var quantity = parseInt(document.getElementById("quantity").value) || 1;

            document.getElementById("unit_price").value = servicePrice;
            document.getElementById("hair_extra_price").value = hairPrice;
            document.getElementById("duration").value = serviceDuration;

            var totalPrice = (servicePrice + hairPrice) * quantity;
            document.getElementById("total_price").value = totalPrice;
        }
    </script>
</div>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
    }

    .action-btn {
        background-color: #ff4d88;
        color: white;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
        border: none;
        transition: background-color 0.3s ease;
    }

    .action-btn:hover {
        background-color: #e04378;
    }
</style>
@endsection
