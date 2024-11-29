@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Progreso de pasos -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="text-center step">
            <div class="step-circle">1</div>
            <small>Servicio</small>
        </div>
        <div class="progress-line mx-2"></div>
        <div class="text-center step">
            <div class="step-circle bg-active">2</div>
            <small>Agendar</small>
        </div>
        <div class="progress-line mx-2"></div>
        <div class="text-center step">
            <div class="step-circle">3</div>
            <small>Confirmación</small>
        </div>
    </div>

    <div class="confirmation-section">
        <div class="user-info">
            <p class="user-name">DIANA OCHOA</p>
            <p class="user-contact"><i class="fa fa-whatsapp"></i> 871-450-1852</p>
        </div>

        <div class="appointment-info">
            <h2>¡Este es el último paso!</h2>
            <div class="appointment-card">
                <h3>Información de la cita</h3>
                <p><i class="fa fa-calendar"></i> <span id="selectedDate">29 de noviembre 2024</span></p>
                <h4>Servicios</h4>
                
                <div class="card p-3 mb-4">
    <h5>Resumen</h5>
    <p id="payment-display">Tipo de Pago: No seleccionado</p>
</div>
                <p><i class="fa fa-user"></i> Milena M</p>
            </div>
        </div>

      <!-- Aquí se mostrará la fecha y la hora -->
<p id="confirmationMessage"></p>

<!-- Aquí se mostrarán los servicios seleccionados -->
<div class="appointment-card">
    <h4>Servicios Seleccionados:</h4>
    <p id="serviciosSeleccionados">No se seleccionaron servicios.</p>
</div>

<!-- Aquí se mostrará el tipo de pago -->
<p id="paymentMethodDisplay">Método de Pago: No seleccionado</p>




    <!-- Botón para agendar cita -->
    <button class="c-button c-button--gooey mt-4" id="agendarCitaBtn">Agendar Cita
        <div class="c-button__blobs">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </button>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Obtener los datos de localStorage
    const selectedDate = localStorage.getItem("selectedDate");
    const selectedTime = localStorage.getItem("selectedTime");
    const serviciosSeleccionados = JSON.parse(localStorage.getItem("serviciosAgregados")) || [];
    const selectedPayment = localStorage.getItem("selectedPayment");

    // Validar datos necesarios
    if (!selectedDate || !selectedTime || !selectedPayment) {
        alert("Faltan datos necesarios. Por favor, completa todos los pasos anteriores.");
        window.location.href = "/paso1";  // Redirigir a la primera vista si faltan datos
        return;
    }

    console.log(`Fecha seleccionada: ${selectedDate}, Hora seleccionada: ${selectedTime}`);
    console.log("Servicios seleccionados:", serviciosSeleccionados);
    console.log("Método de pago seleccionado:", selectedPayment);

    // Convertir el código del tipo de pago a texto legible
    const paymentMethods = {
        "1": "efectivo",
        "2": "transferencia",
        "3": "Tarjeta de Crédito",
    };
    const paymentText = paymentMethods[selectedPayment] || "No seleccionado";

    // Mostrar detalles en la vista
    const confirmationMessage = document.getElementById("confirmationMessage");
    const serviciosContainer = document.getElementById("serviciosSeleccionados");
    const paymentContainer = document.getElementById("paymentMethodDisplay");

    if (confirmationMessage) {
        confirmationMessage.textContent = `Has seleccionado: ${selectedDate} a las ${selectedTime}`;
    }

    if (serviciosContainer) {
        serviciosContainer.innerHTML = "";
        if (serviciosSeleccionados.length > 0) {
            serviciosSeleccionados.forEach(servicio => {
                const servicioElement = document.createElement("p");
                servicioElement.innerHTML = `<i class="fa fa-check"></i> ${servicio}`;
                serviciosContainer.appendChild(servicioElement);
            });
        } else {
            serviciosContainer.textContent = "No se seleccionaron servicios.";
        }
    }

    // Reflejar el tipo de pago
    if (paymentContainer) {
        paymentContainer.textContent = `Método de Pago: ${paymentText}`;
    }

    // Manejar el clic en "Agendar Cita"
    document.getElementById("agendarCitaBtn").addEventListener("click", async () => {
    const ownerId = "{{ auth()->id() }}";
    const bodyData = {
        appointment_day: selectedDate,
        appointment_time: selectedTime,
        owner_id: ownerId, // Puedes reemplazarlo si el ID del usuario está disponible
        services: serviciosSeleccionados,
        payment_type: selectedPayment,
    };

    console.log("Cita a agendar:", bodyData);

    try {
        const response = await fetch("/guardar-cita", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(bodyData),
        });

        const text = await response.text(); // Obtener la respuesta como texto
        console.log("Respuesta del servidor:", text);

        // Intentar parsear la respuesta como JSON
        try {
            const data = JSON.parse(text); // Intentamos parsear la respuesta como JSON
            if (data.success) {
                alert(data.message);
                window.location.href = "/paso3"; // Redirigir a la página de confirmación
            } else {
                let errorMessage = "Errores de validación:\n";
                if (data.errors) {
                    for (const field in data.errors) {
                        errorMessage += `${field}: ${data.errors[field].join(", ")}\n`;
                    }
                } else {
                    errorMessage = data.message;
                }
                alert(errorMessage);
            }
        } catch (error) {
            console.error("Error al parsear la respuesta como JSON:", error);
            alert("Hubo un error al procesar la respuesta del servidor. La respuesta no es válida.");
        }

    } catch (error) {
        console.error("Error al guardar la cita:", error);
        alert("Hubo un error al agendar la cita. Intenta más tarde.");
    }
});

});
</script>







<style>
     .calendar-container {
        max-width: 100%;
        margin: auto;
        background: #ffb7c2;
        color: #000;
        padding: 20px;
        border-radius: 10px;
    }
    .progress-line {
        background-color: #333;
        height: 4px;
        flex-grow: 1;
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
/* Información del usuario */
.user-info {
    text-align: left;
    margin-bottom: 20px;
    padding: 10px;
    border-left: 4px solid #fe889f;
    background-color: #fef5f8;
    border-radius: 8px;
}

.user-name {
    font-size: 18px;
    font-weight: bold;
    color: #fe889f;
}

.user-contact {
    font-size: 14px;
    color: #666;
}

/* Información de la cita */
.confirmation-section h2 {
    font-size: 20px;
    color: #fe889f;
    margin-bottom: 15px;
}

.appointment-card {
    background-color: #fff;
    border: 1px solid #faccd3;
    border-radius: 8px;
    padding: 15px;
    text-align: left;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.appointment-card h3 {
    font-size: 16px;
    color: #ffb7c2;
    margin-bottom: 10px;
}

.appointment-card p {
    font-size: 14px;
    color: #555;
    margin: 5px 0;
}

.appointment-card strong {
    color: #fe889f;
}

/* Botón de agendar */
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
</style>
@endsection