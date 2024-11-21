<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->timestamp('sign_up_date')->useCurrent(); // Fecha de creación de la cita
            $table->date('appointment_day'); // Fecha del día de la cita
            $table->time('appointment_time'); // Hora de la cita
            $table->unsignedBigInteger('owner_id')->nullable(); // Relación con la tabla people_data (cliente)
            $table->enum('status', ['pendiente', 'cancelada', 'confirmada'])->default('pendiente'); // Estado de la cita
            $table->enum('payment_type', ['efectivo', 'transferencia'])->nullable(); // Tipo de pago
            $table->foreign('owner_id')->references('id')->on('people_data')->onDelete('cascade'); // Relación con eliminación en cascada
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
