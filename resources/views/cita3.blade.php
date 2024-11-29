@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success custom-alert" role="alert">
            <i class="bx bxs-envelope"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Resto del contenido -->

<style>
    .custom-alert {
        background-color: #000000;
        color: #ffb7c2; 
        border: 2px solid #ffb7c2; 
        font-size: 24px; 
        font-weight: bold;
        padding: 20px;
        margin: 200px 0;
        border-radius: 12px; 
        display: flex;
        align-items: center;
        gap: 15px; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); 
        animation: fadeIn 1s ease-in-out;
    }

    .custom-alert i {
        font-size: 30px; 
        color: #ffb7c2; 
    }

   
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection