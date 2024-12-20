@php
    use Carbon\Carbon;
    $start = Carbon::createFromTime(9, 0, 0); 
    $end = Carbon::createFromTime(22, 0, 0); 
    $options = [];

    while ($start <= $end) {
        $options[] = $start->format('H:i'); 
        $start->addHour();
    }
@endphp

@extends('layouts.app')

@section('content')
<title>Agendar Cita en el Salón</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff0f5;
        margin: 0;
        padding: 0;
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
    .card {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }
    .calendar-container {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .calendar-header {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    .weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .weekdays div {
        font-size: 1rem;
        color: #ff5c8a;
    }
    .days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        justify-items: center;
    }
    .calendar-day {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .calendar-day:hover {
        background-color: #f0f0f0;
    }
    .calendar-day.selected {
        background-color: #007bff;
        color: #fff;
    }
    .calendar-day.disabled {
        background-color: #f0f0f0;
        color: #ddd;
        pointer-events: none;
    }
    .btn-light {
        color: #007bff;
        border-color: #007bff;
    }
    .btn-light:hover {
        background-color: #007bff;
        color: #fff;
    }
    .custom-alert {
        background-color: #ffb7c2;
        color: #ff5c8a;
        border: 2px solid #ff5c8a;
        border-radius: 5px;
        padding: 15px;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
    }
    .container {
        padding: 15px;
    }

    @media (max-width: 768px) {
        .progress-line {
            display: none;
        }
        .step-circle {
            width: 30px;
            height: 30px;
            font-size: 1rem;
        }
        .calendar-day {
            width: 35px;
            height: 35px;
        }
        .calendar-header {
            font-size: 1rem;
        }
    }
    @media (max-width: 576px) {
        .calendar-day {
            width: 30px;
            height: 30px;
            font-size: 0.9rem;
        }
        .calendar-container {
            padding: 10px;
        }
        .card {
            padding: 10px;
        }
        .step {
            font-size: 0.9rem;
        }
    }
</style>

@if(session('success'))
        <div class="alert alert-success custom-alert" role="alert">
            <i class="bx bxs-envelope"></i> {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
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
            <div class="col-12 col-md-4">
                <div class="card p-3 mb-4">
                    <h5>Servicios Seleccionados</h5>
                    <ul id="servicios-seleccionados" class="list-group mb-3">
                    </ul>
                </div>
                
                <div class="card p-3 mb-4">
                    <h5>Tipo de Pago</h5>
                    <select class="form-select" id="employeeSelect">
                        <option value="" selected>Selecciona el Tipo de Pago</option>
                        <option value="efectivo">efectivo</option>
                        <option value="transferencia">transferencia</option>
                    </select>
                </div>
            </div>
            
            <div class="col-12 col-md-8">
                <div class="card p-4">
                    <div class="calendar-container">
                        <div class="calendar-header d-flex justify-content-between align-items-center mb-3">
                            <h5 id="current-month"></h5>
                            <div>
                                <button class="btn btn-sm btn-light" id="prev-month">&lt;</button>
                                <button class="btn btn-sm btn-light" id="next-month">&gt;</button>
                            </div>
                        </div>
                        <div class="weekdays d-flex justify-content-between text-center mb-2">
                            <div>Dom</div>
                            <div>Lun</div>
                            <div>Mar</div>
                            <div>Mie</div>
                            <div>Jue</div>
                            <div>Vie</div>
                            <div>Sáb</div>
                            
                        </div>
                        <div class="days" id="calendar-days"></div>
                    </div>

                    <div class="mt-4">
                        <h5>Selecciona una Hora</h5>
                        <select class="form-select" id="timeSelect">
                            <option value="">Selecciona una hora</option>
                            @foreach ($options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button id="continueBtn" class="btn btn-primary mt-4" disabled>Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
  document.addEventListener("DOMContentLoaded", function () {
    const calendarDaysContainer = document.getElementById('calendar-days');
    const currentMonthDisplay = document.getElementById('current-month');
    const prevMonthButton = document.getElementById('prev-month');
    const nextMonthButton = document.getElementById('next-month');
    const timeSelect = document.getElementById('timeSelect');
    const continueBtn = document.getElementById('continueBtn');
    const serviciosLista = document.getElementById("servicios-seleccionados");
    const paymentSelect = document.getElementById("employeeSelect");

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    function renderCalendar(month, year) {
        const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        currentMonthDisplay.innerText = `${months[month]} ${year}`;

        const firstDayOfMonth = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        calendarDaysContainer.innerHTML = "";

        for (let i = 0; i < firstDayOfMonth; i++) {
            const emptyDiv = document.createElement('div');
            calendarDaysContainer.appendChild(emptyDiv);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayDiv = document.createElement('div');
            dayDiv.classList.add('calendar-day');
            dayDiv.textContent = day;

            const dayDate = new Date(year, month, day);

            if (dayDate < today || dayDate.getDay() === 0) {
                dayDiv.classList.add('disabled');
                dayDiv.style.pointerEvents = 'none';
            } else {
                dayDiv.addEventListener('click', function () {
                    const selectedDay = document.querySelector('.calendar-day.selected');
                    if (selectedDay) {
                        selectedDay.classList.remove('selected');
                    }
                    dayDiv.classList.add('selected');
                    checkFormCompletion();
                    fetchAgendadasHoras(dayDate.toISOString().split('T')[0]);
                });
            }

            calendarDaysContainer.appendChild(dayDiv);
        }
    }

    function checkFormCompletion() {
        const selectedDate = document.querySelector('.calendar-day.selected');
        const selectedTime = timeSelect.value;
        const selectedPayment = paymentSelect.value;

        continueBtn.disabled = !(selectedDate && selectedTime && selectedPayment);
    }

    paymentSelect.addEventListener("change", checkFormCompletion);
    timeSelect.addEventListener("change", checkFormCompletion);

    continueBtn.addEventListener("click", () => {
        const selectedDate = document.querySelector('.calendar-day.selected');
        const selectedTime = timeSelect.value;
        const selectedPayment = paymentSelect.value;

        if (!selectedDate || !selectedTime || !selectedPayment) {
            alert("Por favor, selecciona una fecha, hora y tipo de pago antes de continuar.");
            return;
        }

        const selectedDay = selectedDate.textContent;
        const selectedDateValue = new Date(currentYear, currentMonth, selectedDay)
            .toISOString()
            .split("T")[0];

        localStorage.setItem("selectedDate", selectedDateValue);
        localStorage.setItem("selectedTime", selectedTime);
        localStorage.setItem("selectedPayment", selectedPayment);

        window.location.href = "/paso2";
    });

    const serviciosSeleccionados = JSON.parse(localStorage.getItem("serviciosAgregados")) || [];
    function renderizarServicios() {
        serviciosLista.innerHTML = "";
        serviciosSeleccionados.forEach(servicio => {
            const listItem = document.createElement("li");
            listItem.className = "list-group-item";
            listItem.textContent = servicio;
            serviciosLista.appendChild(listItem);
        });
    }

    renderizarServicios();
    renderCalendar(currentMonth, currentYear);

    prevMonthButton.addEventListener('click', function () {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        renderCalendar(currentMonth, currentYear);
    });

    nextMonthButton.addEventListener('click', function () {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        renderCalendar(currentMonth, currentYear);
    });

    function fetchAgendadasHoras(fecha) {
        const url = `/agendadas-horas?fecha=${fecha}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const options = document.querySelectorAll('#timeSelect option');
                options.forEach(option => {
                    const optionValue = option.value + ':00';
                    option.disabled = data.includes(optionValue);
                });
                checkFormCompletion(); // Verificar cada vez que se actualicen las horas
            })
            .catch(error => console.error('Error al obtener las horas agendadas:', error));
    }
});

    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
