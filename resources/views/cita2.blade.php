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

    
        <div class="appointment-info">
            
            <div class="appointment-card">
                <h2>Confirmacion de la cita</h2>
               


<!-- Aquí se mostrarán los servicios seleccionados -->
<div class="appointment-card">
    <h5>Servicios Seleccionados:</h5>
   <p id="serviciosSeleccionados">No se seleccionaron servicios.</p>
    <br>
    <h5>Fecha Y Hora:</h5>
      <!-- Aquí se mostrará la fecha y la hora -->
      <i class="fa fa-calendar"></i><p id="confirmationMessage"></p>
      <br>
      <h5>Metodo De Pago :</h5>
      <!-- Aquí se mostrará el tipo de pago -->
<p id="paymentMethodDisplay">No seleccionado</p>

</div>
<a href="/paso1">
<button  class="c-button c-button--gooey mt-4" >Atras
    <div class="c-button__blobs">
        <div></div>
        <div></div>
        <div></div>
    </div>
</button>
</a>

    <!-- Botón para agendar cita -->
    <button class="c-button c-button--gooey mt-4" id="agendarCitaBtn">Agendar Cita
        <div class="c-button__blobs">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </button>
</div>

<div id="successMessage" class="hidden">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <h2>Cita agendada correctamente</h2>
        <button id="closeModal" class="close-btn">Cerrar</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Obtener los datos de localStorage
        const selectedDate = localStorage.getItem("selectedDate");
        const selectedTime = localStorage.getItem("selectedTime");
        const serviciosSeleccionados = JSON.parse(localStorage.getItem("serviciosAgregados")) || [];
        const selectedPayment = localStorage.getItem("selectedPayment");
    
        if (!selectedDate || !selectedTime || !selectedPayment) {
            alert("Faltan datos necesarios. Por favor, completa todos los pasos anteriores.");
            window.location.href = "/paso1"; 
            return;
        }
    
        console.log(`Fecha seleccionada: ${selectedDate}, Hora seleccionada: ${selectedTime}`);
        console.log("Servicios seleccionados:", serviciosSeleccionados);
        console.log("Método de pago seleccionado:", selectedPayment);
    
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
    
        // refleja el tipo de pago en la segunda vista 
        if (paymentContainer) {
            paymentContainer.textContent = `Método de Pago: ${selectedPayment}`;
        }
    
        // aqui maneja el clic del boton de agendar la cita 
        document.getElementById("agendarCitaBtn").addEventListener("click", async () => {
    const ownerId = "{{ auth()->id() }}";
    const bodyData = {
        appointment_day: selectedDate,
        appointment_time: selectedTime,
        owner_id: ownerId,
        services: serviciosSeleccionados,
        payment_type: selectedPayment,
    };

    try {
        const response = await fetch("/guardar-cita", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(bodyData),
        });

        const text = await response.text();
        const data = JSON.parse(text);

        if (data.success) {
            const successModal = document.getElementById("successMessage");
            successModal.classList.remove("hidden");

            document.getElementById("closeModal").addEventListener("click", () => {
                successModal.classList.add("hidden");
                window.location.href = "/paso3"; // Redirigir después de cerrar el modal
            });
        } else if (data.error === "Hora usada") {
            const errorModal = document.getElementById("errorMessage");
            errorModal.classList.remove("hidden");

            document.getElementById("closeErrorModal").addEventListener("click", () => {
                errorModal.classList.add("hidden");
            });
        } else {
            let errorMessage = data.errors
                ? Object.entries(data.errors)
                      .map(([field, errors]) => `${field}: ${errors.join(", ")}`)
                      .join("\n")
                : data.message;
            alert(errorMessage);
        }
    } catch (error) {
        console.error("Hora ya usada, por favor elige otra:", error);
        alert("Hora ya usada, por favor elige otra.");
    }
});

    });
    </script>
    







<style>

    

.hidden {
        display: none;
    }

    /* Fondo semitransparente */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    /* Contenedor del modal */
    .modal-content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffb7c2;
        color: #000;
        border: 2px solid #fe889f;
        border-radius: 10px;
        padding: 20px;
        width: 80%;
        max-width: 400px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        text-align: center;
    }

    .modal-content h2 {
        margin: 0 0 10px;
        font-size: 24px;
        font-weight: bold;
    }


    .modal-content.error {
        background-color: #faccd3; /* Fondo más claro */
        border: 2px solid #fe889f; /* Borde rosa */
        color: #000; /* Texto negro */
    }

    .close-btn {
        background-color: #fe889f;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }

    .close-btn:hover {
        background-color: #ff99ac;
    }


    
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





/* From Uiverse.io by TISEPSE */ 
.btn2 {
  position: relative;
  display: inline-block;
  padding: 15px 30px;
  border: 2px solid #ffb7c2;
  text-transform: uppercase;
  color: #000000;
  text-decoration: none;
  font-weight: 600;
  font-size: 20px;
  transition: 0.3s;
}

.btn2::before {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  width: calc(100% + 4px);
  height: calc(100% - -2px);
  background-color: #ffb7c2;
  transition: 0.3s ease-out;
  transform: scaleY(1);
}

.btn2::after {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  width: calc(100% + 4px);
  height: calc(100% - 50px);
  background-color: #ffb7c2;
  transition: 0.3s ease-out;
  transform: scaleY(1);
}

.btn2:hover::before {
  transform: translateY(-25px);
  height: 0;
}

.btn2:hover::after {
  transform: scaleX(0);
  transition-delay: 0.15s;
}

.btn2:hover {
  border: 2px solid #ffb7c2;
}

.btn2 span {
  position: relative;
  z-index: 3;
}

button {
  text-decoration: none;
  border: none;
  background-color: transparent;
}
</style>
@endsection