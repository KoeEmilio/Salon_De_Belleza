@extends('layouts.app')

@section('content')
<title>Agendar Cita en el Salón</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
    }
    .step {
        font-size: 1rem;
        color: #333;
    }
    .step-circle {
        font-size: 1.3rem;
        background-color: #ffb7c2;
        color: white;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    .step-circle.bg-active {
        background-color: #ff5c8a;
    }
    .progress-line {
        background-color: #333;
        height: 4px;
        flex-grow: 1;
    }
    h2, h5 {
        color: #fe889f;
        font-weight: bold;
        text-align: center;
    }
    .list-group-item {
        background-color: #ffe3e8;
        border: none;
        font-size: 1rem;
        display: flex;
        align-items: center;
    }
    .list-group-item::before {
        content: "💇";
        font-size: 1.2rem;
        color: #ff5c8a;
        margin-right: 10px;
    }
    .btn-primary {
        background-color: #fe889f;
        border: none;
        font-size: 1rem;
    }
    .btn-primary:hover {
        background-color: #ff5c8a;
    }
    .card {
        background-color: #fff8fa;
        border: 2px solid #ff5c8a;
    }
    label {
        color: #ff5c8a;
        font-weight: bold;
    }
    .calendar-container {
        max-width: 100%;
        margin: auto;
        background: #ffb7c2;
        color: #000;
        padding: 20px;
        border-radius: 10px;
    }
    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .calendar-header h1 {
        font-size: 1rem;
        margin: 0;
    }
    .weekdays, .days {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .day {
        width: 14.28%;
        padding: 10px;
        text-align: center;
        cursor: pointer;
    }
    .day.active {
        background-color: #EC407A;
        border-radius: 50%;
        color: white;
    }
    .day.disabled {
    color: #393d42;
    pointer-events: none;
    opacity: 0.5;
}

</style>

<div class="container mt-5">
    <!-- Progreso de pasos -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="text-center step">
            <div class="step-circle bg-active">1</div>
            <small>Servicio</small>
        </div>
        <div class="progress-line mx-2"></div>
        <div class="text-center step">
            <div class="step-circle">2</div>
            <small>Datos del Cliente</small>
        </div>
        <div class="progress-line mx-2"></div>
        <div class="text-center step">
            <div class="step-circle">3</div>
            <small>Confirmación</small>
        </div>
    </div>

    <div class="row">
        <!-- Panel Izquierdo -->
        <div class="col-12 col-md-5 col-lg-4 mb-4">
            <div class="card p-3 mb-4">
                <h5>Servicios Disponibles</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item">Corte de cabello</li>
                    <li class="list-group-item">Peinado</li>
                    <li class="list-group-item">Coloración</li>
                    <li class="list-group-item">Manicura</li>
                </ul>
            </div>
            <div class="card p-3 mb-4">
                <h5>Selecciona un Empleado</h5>
                <select class="form-select">
                    <option selected>Selecciona un empleado</option>
                    <option value="1">Ana</option>
                    <option value="2">Carlos</option>
                    <option value="3">María</option>
                </select>
            </div>
            <div class="card p-3 mb-4">
                <h5>Selecciona una Hora</h5>
                <select class="form-select">
                    <option selected>Selecciona una hora</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">1:00 PM</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary w-100">Continuar</button>
        </div>

        <!-- Panel Derecho: Calendario -->
        <div class="col-12 col-md-7 col-lg-8">
            <div class="calendar-container">
                <div class="calendar-header">
                    <h1 id="current-month"></h1>
                    <div>
                        <button class="btn btn-sm btn-light" id="prev-month">&lt;</button>
                        <button class="btn btn-sm btn-light" id="next-month">&gt;</button>
                    </div>
                </div>
                <div class="weekdays">
                    <div>Lunes</div>
                    <div>Martes</div>
                    <div>Miércoles</div>
                    <div>Jueves</div>
                    <div>Viernes</div>
                    <div>Sábado</div>
                    <div>Domingo</div>
                </div>
                <div class="days" id="calendar-days"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        let date = new Date();
        let selectedDate = null;
        let selectedTime = null;

        function renderCalendar() {
    const month = date.getMonth();
    const year = date.getFullYear();
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const today = new Date(); // Fecha actual

    document.getElementById('current-month').innerText = `${monthNames[month]} ${year}`;
    const calendarDays = document.getElementById('calendar-days');
    calendarDays.innerHTML = '';

    for (let i = 0; i < firstDay; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.classList.add('day');
        calendarDays.appendChild(emptyDay);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const dayElem = document.createElement('div');
        dayElem.classList.add('day');
        dayElem.textContent = day;

        const currentDate = new Date(year, month, day);

        // Deshabilitar días anteriores a hoy
        if (currentDate < today.setHours(0, 0, 0, 0)) {
            dayElem.classList.add('disabled');
        } else {
            dayElem.addEventListener('click', () => {
                document.querySelectorAll('.day').forEach(d => d.classList.remove('active'));
                dayElem.classList.add('active');

                selectedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                console.log(`Fecha seleccionada: ${selectedDate}`);
            });
        }

        // Marcar el día actual
        if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
            dayElem.classList.add('active');
        }

        calendarDays.appendChild(dayElem);
    }
}


        document.getElementById('prev-month').addEventListener('click', () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });

        document.getElementById('next-month').addEventListener('click', () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();

        // Captura el cambio en la hora seleccionada
        const timeSelect = document.querySelector('.form-select');
        if (timeSelect) {
            timeSelect.addEventListener('change', function(event) {
                selectedTime = event.target.value;
                console.log(`Hora seleccionada: ${selectedTime}`);
            });
        }

        // Evento al hacer clic en "Continuar"
        const continueButton = document.querySelector('.btn-primary');
        if (continueButton) {
            continueButton.addEventListener('click', () => {
                if (selectedDate && selectedTime) {
                    console.log(`Enviando fecha: ${selectedDate} y hora: ${selectedTime}`);
                    
                    fetch('/guardar-fecha-hora', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ appointment_day: selectedDate, appointment_time: selectedTime })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Fecha y hora guardadas correctamente en la base de datos');
                        } else {
                            alert('Error al guardar la fecha y hora');
                        }
                    })
                    .catch(error => {
                        console.error('Error en la solicitud:', error);
                    });
                } else {
                    alert('Por favor, selecciona una fecha y una hora.');
                }
            });
        }

        // Cargar y mostrar servicios guardados en localStorage
        const serviciosLista = document.querySelector('.list-group');
        const serviciosAgregados = JSON.parse(localStorage.getItem('serviciosAgregados')) || [];

        serviciosLista.innerHTML = '';
        serviciosAgregados.forEach(servicio => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.textContent = servicio;
            serviciosLista.appendChild(listItem);
        });
    });
</script>


@endsection
