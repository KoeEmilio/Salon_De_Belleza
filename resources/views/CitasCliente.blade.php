@extends('layouts.PerfilUsuario')
@section('title', 'Mis Citas')

@push('styles')
    <style>
        body {
            background-color: #fff0f5;
        }

        .card-header {
            background-color: #000000;
            color: #ffb7c2;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .card {
            width: 100%; 
            max-width: 800px;
            margin: 0 auto;
        }

        .table-responsive {
            overflow-x: auto; /* Permite scroll horizontal en pantallas pequeñas */
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .content-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh; 
            padding: 10px;
        }

        @media (max-width: 958px) {
            .table th, .table td {
                font-size: 0.8rem;
                padding: 0.4rem; /* Espaciado reducido */
                text-align: center; /* Mejor alineación */
            }

            .pagination-container {
                text-align: center;
                margin: 10px 0;
            }
            .pagination-container .page-item {
                display: inline-block;
                margin: 0 5px;
            }
            .pagination-container .page-link {
                font-size: 0.8rem;
                padding: 5px 10px;
            }

            /* Card Title */
            .card-header h3 {
                font-size: 1.2rem;
                text-align: center;
            }
        }

        /* Ajustes para dispositivos muy pequeños */
        @media (max-width: 629px) {
            .navbar-center {
                justify-content: center;
                text-align: center;
            }

            .table-responsive {
                overflow-x: auto;
                display: block;
                width: 100%;
            }

            .table th, .table td {
                display: block;
                width: 100%;
                box-sizing: border-box;
                text-align: left;
                padding: 8px 4px; /* Reduce el espaciado interno */
                font-size: 0.9rem; /* Fuente más pequeña */
            }

            .table th {
                background-color: #f8f9fa;
                font-weight: bold;
            }

            .table td {
                border-top: 1px solid #dee2e6;
            }

            .table thead {
                display: none;
            }

            .table tr {
                display: block;
                margin-bottom: 10px;
            }

            .table tr td:first-child {
                border-top: none;
            }

            .pagination-container {
                flex-wrap: wrap; /* Ajusta la paginación en varias filas si es necesario */
            }

            .page-link {
                padding: 6px 10px; /* Botones más pequeños */
                font-size: 0.9rem;
            }
        }       

        .page-item.active .page-link {
            z-index: 3;
            color: black;
            background-color: #ffb7c2;
            border-color: black;
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #ffb7c2;
            background-color: #000000;
            border: 1px solid #dee2e6;
        }

        .page-link:hover {
            z-index: 2;
            color: #000000;
            text-decoration: none;
            background-color: #ffb7c2;
            border-color: #dee2e6;
        }

        .page-item.disabled .page-link {
            color: #ffb7c2; 
            background-color: #000000; 
            border-color: #000000; 
            pointer-events: none; 
        }

        .cancel-button {
            background-color: #212121; 
            color: #e8e8e8; 
            border: 2px solid #212121; 
            border-radius: 80px; 
            font-size: 1rem; 
            padding: 10px 20px;
            cursor: pointer; 
            transition: all 0.3s ease;
            position: relative; 
            overflow: hidden; 
        }

        .cancel-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #ffb7b7;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .cancel-button:hover::before {
            left: 0;
        }

        .cancel-button:hover {
            color: rgb(0, 0, 0); 
            border-color: #ffb7b7;
        }

        .cancel-button span {
            position: relative;
            z-index: 2;
        }

        @media (max-width: 629px) {
            .card-header {
                width:380px;
            }

            .card-body {
                width:380px;
            }

        }


        
.bin-button {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 55px;
  height: 55px;
  border-radius: 50%;
  background-color: rgb(255, 95, 95);
  cursor: pointer;
  border: 2px solid rgb(255, 201, 201);
  transition-duration: 0.3s;
  position: relative;
  overflow: hidden;
}
.bin-bottom {
  width: 15px;
  z-index: 2;
}
.bin-top {
  width: 17px;
  transform-origin: right;
  transition-duration: 0.3s;
  z-index: 2;
}
.bin-button:hover .bin-top {
  transform: rotate(45deg);
}
.bin-button:hover {
  background-color: rgb(255, 0, 0);
}
.bin-button:active {
  transform: scale(0.9);
}
.garbage {
  position: absolute;
  width: 14px;
  height: auto;
  z-index: 1;
  opacity: 0;
  transition: all 0.3s;
}
.bin-button:hover .garbage {
  animation: throw 0.4s linear;
}
@keyframes throw {
  from {
    transform: translate(-400%, -700%);
    opacity: 0;
  }
  to {
    transform: translate(0%, 0%);
    opacity: 1;
  }
}
.alert-success {
    background-color: #ffb7c2;
    color: #000000;
    border: 2px solid #ff889f;
}

.alert-danger {
    background-color: #000000;
    color: #ffb7c2;
    border: 2px solid #ff889f;
}



.modal-header {
    border-bottom: none;
}
.modal-footer {
    border-top: none;
}
.btn-danger {
    background-color: #ff5959;
    border-color: #ff5959;
}
.btn-danger:hover {
    background-color: #ff3f3f;
    border-color: #ff3f3f;
}
.btn-secondary {
    background-color: #cccccc;
    border-color: #cccccc;
}
.btn-secondary:hover {
    background-color: #bbbbbb;
    border-color: #bbbbbb;
}


    </style>


@endpush

@section('body')
<div class="content-center">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="my-0">Mis Citas</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped m-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">F/H de registro</th>
                            <th scope="col">Dia programado para la cita</th>
                            <th scope="col">Hora programada para la cita</th>
                            <th scope="col">Propietario de la cita</th>
                            <th scope="col">Estado de la cita</th>
                            <th scope="col">Forma de pago</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                        <tr id="cita-{{ $cita->id }}">
                            <td data-label="F/H de registro">{{ $cita->sign_up_date }}</td>
                            <td data-label="Día programado">{{ $cita->appointment_day }}</td>
                            <td data-label="Hora programada">{{ $cita->appointment_time }}</td>
                            <td data-label="Propietario">{{ $cita->first_name }}</td>
                            <td data-label="Estado">{{ $cita->status }}</td>
                            <td data-label="Forma de pago">{{ $cita->payment_type }}</td>
                            <td data-label="Acciones">

                                <td data-label="Acciones">
                                    <form action="{{ route('citas.cancelar', $cita->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" onclick="return confirm('¿Estás seguro de cancelar esta cita?')">
                                            Cancelar
                                        </button>
                                    </form>
                                    
                                </td>
                                
                                
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif



    <div class="pagination-container">
        {{ $citas->links('pagination::bootstrap-5') }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
  $('.btn-cancelar').on('click', function () {
    const citaId = $(this).data('id');

    Swal.fire({
      title: '¿Estás seguro?',
      text: '¿Deseas cancelar esta cita?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#fe889f',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, cancelar',
      cancelButtonText: 'No, mantener'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `/citas/${citaId}/cancelar`,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          success: function () {
            Swal.fire({
              title: '¡Cita cancelada!',
              text: 'La cita ha sido cancelada correctamente.',
              icon: 'success',
              confirmButtonColor: '#fe889f'
            });

            $(`#cita-${citaId}`).find('[data-label="Estado"]').text('cancelada');
          },
          error: function () {
            Swal.fire({
              title: 'Error',
              text: 'Hubo un problema al cancelar la cita.',
              icon: 'error',
              confirmButtonColor: '#fe889f'
            });
          }
        });
      }
    });
  });
});

  </script>
  


@endsection
