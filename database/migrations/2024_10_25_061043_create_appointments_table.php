<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('sign_up_date'); // Fecha de inscripción
            $table->date('appointment_day'); // Día de la cita
            $table->time('appointment_time'); // Hora de la cita
            $table->unsignedBigInteger('owner_id'); // Relación con la persona
            $table->foreign('owner_id')->references('id')->on('people_data')->onDelete('cascade'); // Clave foránea
            $table->enum('status', ['pendiente', 'cancelada', 'confirmada'])->default('pendiente'); // Estado de la cita
            $table->enum('payment_type', ['efectivo', 'transferencia'])->nullable(); // Tipo de pago
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
