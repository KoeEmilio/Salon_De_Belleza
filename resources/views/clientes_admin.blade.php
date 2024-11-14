<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
            padding-top: 60px;
        }
        .container {
            height: 100%;
            flex-grow: 1;
            overflow-y: auto;
        }
        .container-2 {
            height: 100%;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
.switch {
 --secondary-container: #fad9de;
 --primary: #ffb7c2;
 font-size: 17px;
 position: relative;
 display: inline-block;
 width: 3.7em;
 height: 1.8em;
}

.switch input {
 display: none;
 opacity: 0;
 width: 0;
 height: 0;
}

.slider {
 position: absolute;
 cursor: pointer;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 background-color: #313033;
 transition: .2s;
 border-radius: 30px;
}

.slider:before {
 position: absolute;
 content: "";
 height: 1.4em;
 width: 1.4em;
 border-radius: 20px;
 left: 0.2em;
 bottom: 0.2em;
 background-color: #aeaaae;
 transition: .4s;
}

input:checked + .slider::before {
 background-color: var(--primary);
}

input:checked + .slider {
 background-color: var(--secondary-container);
}

input:focus + .slider {
 box-shadow: 0 0 1px var(--secondary-container);
}

input:checked + .slider:before {
 transform: translateX(1.9em);
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
                <h1>CLIENTES</h1>
            </div>
        </nav>
    </div>

    <div class="principal">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="my-0">Lista de Clientes</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover table-striped m-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td class="user-name">{{ $usuario->name }}</td>
                                <td class="user-email">{{ $usuario->email }}</td>
                                <td>
                                  <div class="button-container">
                                    <button class="editBtn">
                                        <svg height="1em" viewBox="0 0 512 512">
                                          <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                          ></path>
                                        </svg>
                                      </button>
                                      <label class="switch">
                                        <input type="checkbox" id="switch-{{ $usuario->id }}" class="user-switch" data-user-id="{{ $usuario->id }}" checked>
                                        <span class="slider"></span>
                                      </label>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
              {{ $usuarios -> links('pagination::bootstrap-5') }}
          </div>
      
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Formulario de edición -->
                  <form id="editUserForm" method="POST" action="{{ route('update.user') }}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" id="userId" name="userId">
                      <div class="mb-3">
                          <label for="name" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Correo</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Contraseña</label>
                          <input type="password" class="form-control" id="password" name="password">
                      </div>
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const switches = document.querySelectorAll('.user-switch');

    switches.forEach(switchElement => {
        const userId = switchElement.getAttribute('data-user-id');

        const isSwitchOn = localStorage.getItem(`switchState-${userId}`);
        
        if (isSwitchOn === null) {
            switchElement.checked = true;
            localStorage.setItem(`switchState-${userId}`, 'true');
        } else {
            switchElement.checked = (isSwitchOn === 'true');
        }

        switchElement.addEventListener('change', function () {
            localStorage.setItem(`switchState-${userId}`, switchElement.checked);
        });
    });

    const editButtons = document.querySelectorAll('.editBtn');

editButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Obtener los datos del usuario desde la fila
        const row = button.closest('tr');
        const userId = row.querySelector('.user-id').textContent;
        const userName = row.querySelector('.user-name').textContent;
        const userEmail = row.querySelector('.user-email').textContent;

        // Llenar el formulario con los datos
        document.getElementById('userId').value = userId;
        document.getElementById('name').value = userName;
        document.getElementById('email').value = userEmail;

        // Mostrar el modal
        var myModal = new bootstrap.Modal(document.getElementById('editUserModal'));
        myModal.show();
    });
});
});


    </script>
</body>
</html>