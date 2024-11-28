@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #d81b60;">Crear un nuevo servicio</h2>
    <a href="{{ route('services.index', ['client_id' => $clientId]) }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">
        Regresar
    </a>    
    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <!-- Campo para seleccionar el servicio -->
        <div class="form-group">
            <label for="service_id" style="color: #d81b60;">Servicio</label>
            <select class="form-control" name="service_id" id="service_id" required>
                <option value="">Seleccione un servicio</option>
                @foreach ($services as $service)
                <option value="{{ $service->id }}" 
                    data-price="{{ $service->price }}" 
                    data-duration="{{ $service->duration }}" 
                    data-description="{{ $service->description }}">
                    {{ $service->service_name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Campos que se llenan automáticamente -->
        <div class="form-group">
            <label for="price" style="color: #d81b60;">Precio Base</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" readonly>
        </div>

        <div class="form-group">
            <label for="description" style="color: #d81b60;">Descripción</label>
            <textarea class="form-control" name="description" id="description" readonly></textarea>
        </div>

        <div class="form-group">
            <label for="duration" style="color: #d81b60;">Duración (minutos)</label>
            <input type="text" class="form-control" name="duration" id="duration" readonly>
        </div>

        <!-- Campo para tipo de cabello (opcional) -->
        <div class="form-group">
            <label for="hair_type" style="color: #d81b60;">Tipo de Cabello</label>
            <select class="form-control" name="hair_type" id="hair_type">
                <option value="">Seleccione un tipo de cabello</option>
                @foreach ($hairTypes as $hairType)
                    <option value="{{ $hairType->id }}" data-price="{{ $hairType->price }}">
                        {{ $hairType->type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="unit_price" style="color: #d81b60;">Precio Adicional por Tipo de Cabello</label>
            <input type="number" class="form-control" name="unit_price" id="unit_price" readonly>
        </div>

        <input type="hidden" name="client_id" value="{{ $clientId }}">

        <button type="submit" class="btn btn-success" style="background-color: #d81b60; border-color: #d81b60;">Guardar servicio</button>
    </form>
</div>

<script>
    document.getElementById('service_id').addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    document.getElementById('price').value = selectedOption.getAttribute('data-price');
    document.getElementById('description').value = selectedOption.getAttribute('data-description');
    document.getElementById('duration').value = selectedOption.getAttribute('data-duration');
});

document.getElementById('hair_type').addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    document.getElementById('unit_price').value = selectedOption.getAttribute('data-price');
});
    </script>
@endsection
