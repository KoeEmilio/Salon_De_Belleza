@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #d81b60;">Crear un nuevo servicio</h2>
    
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <!-- Nombre del servicio -->
        <div class="form-group">
            <label for="service_name" style="color: #d81b60;">Servicio</label>
            <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Buscar servicio..." required>
            <div id="service_suggestions" class="list-group mt-2" style="display:none;"></div>
        </div>
    
        <!-- Precio del servicio -->
        <div class="form-group">
            <label for="price" style="color: #d81b60;">Precio del servicio</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" required readonly style="background-color: #fce4ec;">
        </div>
    
        <!-- Descripción del servicio -->
        <div class="form-group">
            <label for="description" style="color: #d81b60;">Descripción</label>
            <textarea class="form-control" name="description" id="description" readonly style="background-color: #fce4ec;"></textarea>
        </div>
    
        <!-- Duración del servicio -->
        <div class="form-group">
            <label for="duration" style="color: #d81b60;">Duración (minutos)</label>
            <input type="number" class="form-control" name="duration" id="duration" required readonly style="background-color: #fce4ec;">
        </div>
    
        <!-- Tipo de cabello -->
        <div class="form-group">
            <label for="hair_type" style="color: #d81b60;">Tipo de cabello</label>
            <select class="form-control" name="hair_type" id="hair_type" required>
                <option value="">Seleccione un tipo de cabello</option>
                @foreach ($hairTypes as $hairType)
                    <option value="{{ $hairType->id }}" data-price="{{ $hairType->price }}">
                        {{ $hairType->type }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <!-- Precio extra por tipo de cabello -->
        <div class="form-group">
            <label for="unit_price" style="color: #d81b60;">Precio extra por tipo de cabello</label>
            <input type="number" class="form-control" name="unit_price" id="unit_price" step="0.01" required readonly style="background-color: #fce4ec;">
        </div>
    
        <!-- client_id oculto -->
        <input type="hidden" name="client_id" value="{{ $clientId }}">
    
        <button type="submit" class="btn btn-success" style="background-color: #d81b60; border-color: #d81b60;">Guardar servicio</button>
        <div class="text-center mt-4">
            <a href="javascript:history.back()" class="btn btn-outline-secondary mb-4">
    <i class="fas fa-arrow-left"></i> Regresar
</a>

        </div>
    </form>
</div>

<script>
    // Filtrado de servicios en tiempo real
    document.getElementById('service_name').addEventListener('input', function() {
        var input = this.value.toLowerCase();
        var suggestions = document.getElementById('service_suggestions');
        suggestions.innerHTML = ''; // Limpiar sugerencias anteriores
        suggestions.style.display = 'none'; // Ocultar el contenedor de sugerencias

        // Filtrar servicios según el texto ingresado
        var filteredServices = @json($services).filter(function(service) {
            return service.service_name.toLowerCase().includes(input);
        });

        // Mostrar las sugerencias si hay alguna
        if (filteredServices.length > 0) {
            filteredServices.forEach(function(service) {
                var suggestionItem = document.createElement('div');
                suggestionItem.className = 'list-group-item list-group-item-action';
                suggestionItem.innerHTML = service.service_name;
                suggestionItem.setAttribute('data-price', service.price);
                suggestionItem.setAttribute('data-description', service.description);
                suggestionItem.setAttribute('data-duration', service.duration);
                suggestionItem.addEventListener('click', function() {
                    document.getElementById('service_name').value = service.service_name;
                    document.getElementById('price').value = service.price;
                    document.getElementById('description').value = service.description;
                    document.getElementById('duration').value = service.duration;
                    suggestions.style.display = 'none'; // Ocultar las sugerencias al seleccionar una
                });
                suggestions.appendChild(suggestionItem);
            });
            suggestions.style.display = 'block'; // Mostrar el contenedor de sugerencias
        }
    });

    // Evento cuando cambia el tipo de cabello seleccionado
    document.getElementById('hair_type').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('unit_price').value = selectedOption.getAttribute('data-price');
    });
</script>
@endsection
