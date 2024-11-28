<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #CFCFCF;
        }
        .text-decoration-none {
            text-decoration: none;
        }
        .fondo_personalizado {
            background-color: #000000;
        }
        .navbar-center {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .custom-color-text {
            color: #ffb7c2;
        }
        .custom-icon-size {
            font-size: 48px;
        }
        .custom-icon-color {
            color: #ffb7c2;
        }
        .logout-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
        }
        nav h1 {
            margin: 0 auto;
            color: #ffb7c2;
        }
        .principal {
            height: calc(100vh - 105px);
            width: 100vw;
            display: flex;
        }
        .container {
            height: 100%;
            flex-grow: 1;
            overflow-y: auto;
        }
        .container-2 {
            height: 16%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding: 15px;
        }
        .button {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: rgb(20, 20, 20);
  border: none;
  font-weight: 600;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
  gap: 2px;
}

.btn-container {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #e8e8e8;
            z-index: 1;
            background: #212121;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
        }

        .btn-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 15px;
            background-color: #ffb7c2;
            z-index: -1;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(255, 255, 255, 0.27);
            box-shadow: 4px 8px 19px -3px rgba(255, 255, 255, 0.27);
            transition: all 250ms;
        }

        .btn-container:hover {
            color: #212121;
        }

        .btn-container:hover::before {
            width: 100%;
        }

.svgIcon {
  width: 12px;
  transition-duration: 0.3s;
}

.svgIcon path {
  fill: white;
}

.button:hover {
  transition-duration: 0.3s;
  background-color: #ffb7c2;
  align-items: center;
  gap: 0;
}

.bin-top {
  transform-origin: bottom right;
}
.button:hover .bin-top {
  transition-duration: 0.5s;
  transform: rotate(160deg);
}

    
.editBtn {
  width: 50px;
  height: 50px;
  border-radius: 20px;
  border: none;
  background-color: rgb(93, 93, 116);
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all 0.3s;
}
.editBtn::before {
  content: "";
  width: 200%;
  height: 200%;
  background-color: #ffb7c2;
  position: absolute;
  z-index: 1;
  transform: scale(0);
  transition: all 0.3s;
  border-radius: 50%;
  filter: blur(10px);
}
.editBtn:hover::before {
  transform: scale(1);
}
.editBtn:hover {
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.336);
}

.editBtn svg {
  height: 17px;
  fill: white;
  z-index: 3;
  transition: all 0.2s;
  transform-origin: bottom;
}
.editBtn:hover svg {
  transform: rotate(-15deg) translateX(5px);
}

.editBtn:hover::after {
  transform: scaleX(1);
  left: 0px;
  transform-origin: right;
}

.button-container {
  display: flex;
  gap: 8px; /* Space between buttons */
  align-items: center;
}

.button,
.editBtn {
  width: 40px; /* Adjusted size */
  height: 40px; /* Adjusted size */
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
        }
        .pagination {
            justify-content: center;
        }
        .custom-color-text {
            color: #ffb7c2;
        }
        .custom-icon-size {
            font-size: 48px;
        }
        .custom-icon-color {
            color: #ffb7c2;
        }
        .pagination .page-link {
            border-radius: 50%;
            margin: 0 5px;
        }

        .pagination .page-item.active .page-link {
            background-color: #ffb7c2;
            border-color: #ffb7c2;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light fondo_personalizado">
            <div class="d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="btn logout-button">
                    <i class='bx bxs-home custom-icon-size custom-icon-color'></i>
                    <span class="custom-color-text">Inicio</span>
                </a>
            </div>
            <div class="navbar-center flex-grow-1">
                <h1>SERVICIOS</h1>
            </div>
        </nav>
    </div>

    <div class="principal">
        <div class="container">
          <div class="container-2" id="menuDropdown">
            <a href="{{route('addservice')}}">
            <button class="btn-container">Agregar Servicio</button>
          </a>
          <a href="{{route('graficaMes')}}">
          <button class="btn-container">Estadistica</button>
        </a>
        </div>  
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="my-0">Lista de Servicios</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-striped m-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Servicio</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Duración</th>
                                <th scope="col">Tipo de Servicio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicios as $servicio)
                            <tr>
                                <td>{{ $servicio->service_name }}</td>
                                <td>{{ $servicio->price }}</td>
                                <td>{{ $servicio->description }}</td>
                                <td>{{ $servicio->duration }}</td>
                                <td>{{ $servicio->typeService->type }}</td>
                                <td>
                                  <div class="button-container">
                                    <button class="editBtn">
                                        <svg height="1em" viewBox="0 0 512 512">
                                          <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                          ></path>
                                        </svg>
                                      </button>
                                      <form action="{{ route('servicios.delete', $servicio->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?')">
                                        @csrf
                                        @method('DELETE')
                                  <button class="button">
                                      <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 69 14"
                                        class="svgIcon bin-top"
                                      >
                                        <g clip-path="url(#clip0_35_24)">
                                          <path
                                            fill="black"
                                            d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"
                                          ></path>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_35_24">
                                            <rect fill="white" height="14" width="69"></rect>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                    
                                      <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 69 57"
                                        class="svgIcon bin-bottom"
                                      >
                                        <g clip-path="url(#clip0_35_22)">
                                          <path
                                            fill="black"
                                            d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"
                                          ></path>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_35_22">
                                            <rect fill="white" height="57" width="69"></rect>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                    </button>
                                  </form>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
              <nav aria-label="Page navigation example">
                  <ul class="pagination">
                      <!-- Páginas anteriores -->
                      @if ($servicios->onFirstPage())
                      <li class="page-item disabled">
                          <span class="page-link">Anterior</span>
                      </li>
                      @else
                      <li class="page-item">
                          <a class="page-link" href="{{ $servicios->previousPageUrl() }}" aria-label="Previous">
                              <i class="fas fa-arrow-left"></i> Anterior
                          </a>
                      </li>
                      @endif

                      <!-- Páginas numeradas -->
                      @foreach ($servicios->getUrlRange(1, $servicios->lastPage()) as $page => $url)
                      <li class="page-item {{ $page == $servicios->currentPage() ? 'active' : '' }}">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                      </li>
                      @endforeach

                      <!-- Páginas siguientes -->
                      @if ($servicios->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $servicios->nextPageUrl() }}" aria-label="Next">
                              Siguiente <i class="fas fa-arrow-right"></i>
                          </a>
                      </li>
                      @else
                      <li class="page-item disabled">
                          <span class="page-link">Siguiente</span>
                      </li>
                      @endif
                  </ul>
              </nav>
          </div>
      
        </div>
    </div>
</body>
</html>