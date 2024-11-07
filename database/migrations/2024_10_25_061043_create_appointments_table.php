<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->unsignedBigInteger('client_id'); // ID del cliente
            $table->foreign('client_id')->references('id')->on('people_data')->onDelete('cascade'); // Relación con people_data
            $table->dateTime('sign_up_date'); 
            $table->date('appointment_day'); 
            $table->time('appointment_time'); 
            $table->enum('status', ['pendiente', 'cancelada', 'confirmada'])->default('pendiente'); // Estado de la cita
            $table->enum('payment_type', ['efectivo', 'transferencia']); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
