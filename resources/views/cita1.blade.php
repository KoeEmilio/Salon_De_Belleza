@extends('layouts.app')

@section('content')
<title>Agendar Cita en el Salón</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

<style>
    body {
        font-family:  Arial, sans-serif;
        background-color: #fff0f5;
    }
    .step {
        font-size: 1.2rem;
        color: #333;
    }
    .step-circle {
        font-size: 1.5rem;
        background-color: #ffb7c2;
        color: white;
        width: 50px;
        height: 50px;
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
        font-size: 1.1rem;
        display: flex;
        align-items: center;
    }
    .list-group-item::before {
        content: "💇";
        font-size: 1.5rem;
        color: #ff5c8a;
        margin-right: 10px;
    }
    .btn-primary {
        background-color: #fe889f;
        border: none;
        font-size: 1.2rem;
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
    .form-group .input-group-text {
        background-color: #ffe3e8;
        border: none;
    }
    /* Layout customization */
    .main-content {
        display: flex;
    }
    .left-panel {
        flex: 1;
        margin-right: 20px;
    }
    .calendar-container {
        flex: 1;
        margin-left: 20px;
    }


    .calendar-container {
        max-width: 600px;
        margin: auto;
        background: #ffb7c2 ;
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
        font-size: 1.4rem;
        margin: 0;
    }
    .weekdays {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        padding: 10px 0;
    }
    .days {
        display: flex;
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
    .event {
        position: relative;
    }
    .event:after {
        content: '•';
        font-size: 1.5rem;
        color: #ff5c8a;
        position: absolute;
        top: -8px;
        right: -8px;
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

    <div class="main-content">
        <!-- Left Panel: Services, Employees, and Hours Selection -->
        <div class="left-panel">
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

            <button type="submit" class="btn btn-primary w-100 mt-3">Continuar</button>
        </div>

        <!-- Right Panel: Calendar -->
        <div class="calendar-container">
            <div class="calendar">
                <!-- Inserta aquí el calendario existente sin modificaciones -->

<div class="container mt-5">
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
            <div>Miercoles</div>
            <div>Jueves</div>
            <div>Viernes</div>
            <div>Sabado</div>
            <div>Viernes</div>
        </div>

        <div class="days" id="calendar-days"></div>
    </div>
</div>


            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        let date = new Date();

        function renderCalendar() {
            const month = date.getMonth();
            const year = date.getFullYear();
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            document.getElementById('current-month').innerText = `${monthNames[month]} ${year}`;
            const calendarDays = document.getElementById('calendar-days');
            calendarDays.innerHTML = '';

            // Display empty days for previous month
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.classList.add('day');
                calendarDays.appendChild(emptyDay);
            }

            // Display days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElem = document.createElement('div');
                dayElem.classList.add('day');
                dayElem.textContent = day;
                if (day === new Date().getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) {
                    dayElem.classList.add('active');
                }
                dayElem.addEventListener('click', () => {
                    document.querySelectorAll('.day').forEach(d => d.classList.remove('active'));
                    dayElem.classList.add('active');
                    alert(`You selected ${day} ${monthNames[month]} ${year}`);
                });
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
    });

    document.addEventListener('DOMContentLoaded', function () {
    const serviciosLista = document.querySelector('.list-group');
    const serviciosAgregados = JSON.parse(localStorage.getItem('serviciosAgregados')) || [];

    // Limpia la lista y agrega los servicios desde localStorage
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
