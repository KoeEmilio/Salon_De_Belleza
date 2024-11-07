@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMF2Mj0O4b2J4g0mEEnE0Hq4Lg0Ub4PhG6fO0" crossorigin="anonymous">

<div class="container mt-5">
  <h1 class="text-center mb-4">Servicios Agregados</h1>
  <ul id="servicios-lista" class="list-group mb-4"></ul>
  
  <div class="d-flex justify-content-end align-items-center">
    <button class="c-button c-button--gooey"> AGENDAR
      <div class="c-button__blobs">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </button>
  </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: block; height: 0; width: 0;">
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></feColorMatrix>
      <feBlend in="SourceGraphic" in2="goo"></feBlend>
    </filter>
  </defs>
</svg>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const servicios = JSON.parse(localStorage.getItem('serviciosAgregados')) || [];
    const lista = document.getElementById('servicios-lista');

    function renderServicios() {
      lista.innerHTML = '';

      servicios.forEach((servicio, index) => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center list-item';
        listItem.textContent = servicio;

        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn btn-danger btn-sm delete-button';
        deleteButton.innerHTML = '<i class="fas fa-times-circle"></i>'; 
        deleteButton.onclick = () => {
          eliminarServicio(index, listItem);
        };

        listItem.appendChild(deleteButton);
        lista.appendChild(listItem);
      });
    }

    function eliminarServicio(index, listItem) {
      listItem.classList.add('fade-out');
      setTimeout(() => {
        servicios.splice(index, 1); 
        localStorage.setItem('serviciosAgregados', JSON.stringify(servicios)); 
        renderServicios();
      }, 300); 
    }

    renderServicios();
  });
</script>

<style>
    /* From Uiverse.io by cssbuttons-io */ 
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
    background-color: #ffe6e6;
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
    background-color: #ff4b47;
}

.fade-out {
    animation: fadeOut 0.3s forwards;
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; transform: translateX(-20px); }
}
</style>
@endsection
