@extends('layouts.recepcionista')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Editar servicio</h2>

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="service_name">Nombre del servicio</label>
            <input type="text" class="form-control" name="service_name" id="service_name" value="{{ old('service_name', $service->service_name) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Precio del servicio</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $service->price) }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" name="description" id="description">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="type_of_hair">Tipo de pelo</label>
            <input type="text" class="form-control" name="type_of_hair" id="type_of_hair" value="{{ old('type_of_hair', $service->type_of_hair) }}">
        </div>

        <div class="form-group">
            <label for="unit_price">Precio por tipo de pelo</label>
            <input type="number" class="form-control" name="unit_price" id="unit_price" value="{{ old('unit_price', $service->unit_price) }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="duration">Duración (minutos)</label>
            <input type="number" class="form-control" name="duration" id="duration" value="{{ old('duration', $service->duration) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar servicio</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
