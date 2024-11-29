@extends('layouts.recepcionista')

@section('content')
<div class="container">
    <h2>Agregar Servicio a la Cita</h2>

    <h3>Cita de: {{ $cita->owner->first_name }} {{ $cita->owner->last_name }}</h3>

    <form action="{{ route('service.store', ['appointmentId' => $cita->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="service_id">Servicio</label>
            <select name="service_id" id="service_id" class="form-control" required onchange="updatePriceAndDuration()">
                <option value="">Selecciona un servicio</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" data-price="{{ $service->price }}" data-duration="{{ $service->duration }}">
                        {{ $service->service_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="hair_type_id">Tipo de Cabello</label>
            <select name="hair_type_id" id="hair_type_id" class="form-control" required onchange="updatePriceAndDuration()">
                <option value="">Selecciona un tipo de cabello</option>
                @foreach ($hairTypes as $hairType)
                    <option value="{{ $hairType->id }}" data-price="{{ $hairType->price }}">
                        {{ $hairType->type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="unit_price">Precio del Servicio</label>
            <input type="number" name="unit_price" id="unit_price" class="form-control" required readonly>
        </div>

        <div class="form-group">
            <label for="hair_extra_price">Precio Adicional por Tipo de Cabello</label>
            <input type="number" name="hair_extra_price" id="hair_extra_price" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="duration">Duración del Servicio</label>
            <input type="text" name="duration" id="duration" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" required onchange="updatePriceAndDuration()">
        </div>

        <div class="form-group">
            <label for="total_price">Precio Total</label>
            <input type="number" name="total_price" id="total_price" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Servicio</button>
    </form>

    <script>
        // Función para actualizar los precios y la duración cuando se selecciona un servicio o tipo de cabello
        function updatePriceAndDuration() {
            var servicePrice = parseFloat(document.getElementById("service_id").selectedOptions[0].getAttribute("data-price")) || 0;
            var serviceDuration = document.getElementById("service_id").selectedOptions[0].getAttribute("data-duration") || '0';
            var hairPrice = parseFloat(document.getElementById("hair_type_id").selectedOptions[0].getAttribute("data-price")) || 0;
            var quantity = parseInt(document.getElementById("quantity").value) || 1;
    
            // Actualizar los precios de servicio, tipo de cabello y duración
            document.getElementById("unit_price").value = servicePrice;
            document.getElementById("hair_extra_price").value = hairPrice;
            document.getElementById("duration").value = serviceDuration;
    
            // Recalcular el precio total
            var totalPrice = (servicePrice + hairPrice) * quantity;
            document.getElementById("total_price").value = totalPrice.toFixed(2);
        }
    
        // Asegurarse de recalcular el precio cuando cambie la cantidad
        document.getElementById('quantity').addEventListener('input', updatePriceAndDuration);
    
        // Ejecutar la función para inicializar los valores por defecto al cargar la página
        window.onload = function() {
            updatePriceAndDuration();
        };
    </script>
</div>
@endsection
