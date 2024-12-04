@extends('layouts.recepcionista')

@section('content')
<div class="container py-5">
    <h2 class="text-center text-pink mb-4">Agregar Servicio a la Cita</h2>

    <h3 class="text-center text-dark mb-4">Cita de: {{ $cita->owner->first_name }} {{ $cita->owner->last_name }}</h3>

    <form action="{{ route('service.store', ['appointmentId' => $cita->id]) }}" method="POST" class="shadow-lg p-4 rounded bg-light">
        @csrf
        <div class="form-group mb-3">
            <label for="service_id" class="form-label text-dark">Servicio</label>
            <select name="service_id" id="service_id" class="form-control" required onchange="updatePriceAndDuration()">
                <option value="">Selecciona un servicio</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" data-price="{{ $service->price }}" data-duration="{{ $service->duration }}">
                        {{ $service->service_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="hair_type_id" class="form-label text-dark">Tipo de Cabello</label>
            <select name="hair_type_id" id="hair_type_id" class="form-control" required onchange="updatePriceAndDuration()">
                <option value="">Selecciona un tipo de cabello</option>
                @foreach ($hairTypes as $hairType)
                    <option value="{{ $hairType->id }}" data-price="{{ $hairType->price }}">
                        {{ $hairType->type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="unit_price" class="form-label text-dark">Precio del Servicio</label>
            <input type="number" name="unit_price" id="unit_price" class="form-control" required readonly>
        </div>

        <div class="form-group mb-3">
            <label for="hair_extra_price" class="form-label text-dark">Precio Adicional por Tipo de Cabello</label>
            <input type="number" name="hair_extra_price" id="hair_extra_price" class="form-control" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="duration" class="form-label text-dark">Duración del Servicio</label>
            <input type="text" name="duration" id="duration" class="form-control" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="quantity" class="form-label text-dark">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" required onchange="updatePriceAndDuration()">
        </div>

        <div class="form-group mb-3">
            <label for="total_price" class="form-label text-dark">Precio Total</label>
            <input type="number" name="total_price" id="total_price" class="form-control" readonly>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3">
            <a href="{{ route('service.index', ['appointmentId' => $cita->id]) }}" class="btn btn-pink w-100 w-md-50 py-2">
                Regresar
            </a>
            <button type="submit" class="btn btn-pink w-100 w-md-50 py-2">Agregar Servicio</button>
        </div>
    </form>
</div>

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
        document.getElementById("total_price").value = totalPrice.toFixed(2);
    }
    
    document.getElementById('quantity').addEventListener('input', updatePriceAndDuration);
    
    window.onload = function() {
        updatePriceAndDuration();
    };
</script>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f7f7;
    }

    .container {
        max-width: 800px;
        margin-top: 30px;
    }

    h2, h3 {
        color: #d81b60;
    }

    .form-control {
        border-radius: 0.5rem;
        border: 1px solid #ddd;
    }

    .form-control:focus {
        border-color: #d81b60;
        box-shadow: 0 0 5px rgba(216, 27, 96, 0.5);
    }

    .btn-pink {
        background-color: #ffb7c2;
        border-color: #ffb7c2;
        border-radius: 0.5rem;
        font-size: 16px;
    }

    .btn-pink:hover {
        background-color: #ff9eaa;
        border-color: #ff9eaa;
    }

    .form-label {
        font-weight: bold;
        color: #333;
    }

    .shadow-lg {
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .rounded {
        border-radius: 10px;
    }

    .py-5 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .gap-3 {
        gap: 1rem;
    }
</style>
@endsection
