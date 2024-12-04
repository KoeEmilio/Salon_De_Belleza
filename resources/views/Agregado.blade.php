@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMF2Mj0O4b2J4g0mEEnE0Hq4Lg0Ub4PhG6fO0" crossorigin="anonymous">
<div class="container mt-5">
  <h1 class="text-center mb-4">Servicios Agregados</h1>
  <ul id="servicios-lista" class="list-group mb-4"></ul>
  <p id="mensaje-vacio" class="text-center text-muted" style="display: none;">No hay servicios seleccionados.</p>
  
  <div class="d-flex justify-content-end align-items-center">
    <button id="agendar-btn" onclick="window.location.href='{{ route('carga') }}'" class="c-button c-button--gooey" style="display: none;"> 
      Agendar
      <div class="c-button__blobs">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </button>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br><br><br>
<br><br><br><br><br>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  let servicios = JSON.parse(localStorage.getItem('serviciosAgregados')) || [];
  const lista = document.getElementById('servicios-lista');
  const agendarBtn = document.getElementById('agendar-btn');
  const mensajeVacio = document.getElementById('mensaje-vacio');

  // Eliminar duplicados
  servicios = [...new Set(servicios)];
  localStorage.setItem('serviciosAgregados', JSON.stringify(servicios));

  function renderServicios() {
    lista.innerHTML = '';
    if (servicios.length === 0) {
      mensajeVacio.style.display = 'block';
    } else {
      mensajeVacio.style.display = 'none';
      servicios.forEach((servicio, index) => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center list-item';
        listItem.textContent = servicio;

        const deleteButton = document.createElement('button');
        deleteButton.className = 'button delete-button';
        deleteButton.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 14" class="svgIcon bin-top">
            <g clip-path="url(#clip0_35_24)">
              <path fill="black" d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"></path>
            </g>
            <defs><clipPath id="clip0_35_24"><rect fill="white" height="14" width="69"></rect></clipPath></defs>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 57" class="svgIcon bin-bottom">
            <g clip-path="url(#clip0_35_22)">
              <path fill="black" d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"></path>
            </g>
            <defs><clipPath id="clip0_35_22"><rect fill="white" height="57" width="69"></rect></clipPath></defs>
          </svg>
        `;

        deleteButton.onclick = () => {
          eliminarServicio(index);
        };

        listItem.appendChild(deleteButton);
        lista.appendChild(listItem);
      });
    }

    agendarBtn.style.display = servicios.length > 0 ? 'inline-block' : 'none';
  }

  function eliminarServicio(index) {
    servicios.splice(index, 1); 
    localStorage.setItem('serviciosAgregados', JSON.stringify(servicios)); 
    renderServicios();
  }

  renderServicios();
});
</script>

<style>
.c-button {
  color: #000;
  font-weight: 700;
  font-size: 16px;
  text-decoration: none;
  padding: 0.9em 1.6em;
  cursor: pointer;
  display: inline-block;
  vertical-align: middle;
  position: relative;
  z-index: 1;
}

.c-button--gooey {
  color: #ffb7c2;
  text-transform: uppercase;
  letter-spacing: 2px;
  border: 4px solid #ffb7c2;
  border-radius: 0;
  position: relative;
  transition: all 700ms ease;
}

.c-button--gooey .c-button__blobs {
  height: 100%;
  filter: url(#goo);
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
  bottom: -3px;
  right: -1px;
  z-index: -1;
}

.c-button--gooey .c-button__blobs div {
  background-color: #ffb7c2;
  width: 34%;
  height: 100%;
  border-radius: 100%;
  position: absolute;
  transform: scale(1.4) translateY(125%) translateZ(0);
  transition: all 700ms ease;
}

.c-button--gooey .c-button__blobs div:nth-child(1) {
  left: -5%;
}

.c-button--gooey .c-button__blobs div:nth-child(2) {
  left: 30%;
  transition-delay: 60ms;
}

.c-button--gooey .c-button__blobs div:nth-child(3) {
  left: 66%;
  transition-delay: 25ms;
}

.c-button--gooey:hover {
  color: #fff;
}

.c-button--gooey:hover .c-button__blobs div {
  transform: scale(1.4) translateY(0) translateZ(0);
}

h1 {
    color: #ff6f61;
}

.list-group-item {
    background-color: #fff0f5;
    color: #333;
    border: 1px solid #ff6f61;
    transition: transform 0.2s, background-color 0.2s;
}

.list-group-item:hover {
    background-color: #ffd1d1;
    transform: scale(1.02);
}

.delete-button {
    background-color: #ff6f61;
    border: none;
}

.delete-button:hover {
    background-color: #ff6f61;
}

.fade-out {
    animation: fadeOut 0.3s forwards;
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; transform: translateX(-20px); }
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
  background-color:#EC407A;
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

</style>
@endsection
