<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->unsignedBigInteger('client_id'); // ID del cliente
            $table->foreign('client_id')->references('id')->on('people_data')->onDelete('cascade'); // Relación con people_data
            $table->unsignedBigInteger('employee_id'); // ID del empleado
            $table->foreign('employee_id')->references('id')->on('employees_data')->onDelete('cascade'); // Relación con employees_data
            $table->unsignedBigInteger('service_id'); // ID del servicio
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade'); // Relación con services
            $table->enum('appointment', ['si', 'no']); // Indica si hay cita
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
