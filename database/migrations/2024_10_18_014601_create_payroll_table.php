<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTable extends Migration
{
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id'); // Clave foránea para el empleado
            $table->date('period_start'); // Fecha de inicio del período de pago
            $table->date('period_end'); // Fecha de finalización del período de pago
            $table->decimal('base_salary', 10, 2); // Salario base
            $table->decimal('total_hours_worked', 5, 2)->default(0); // Horas trabajadas
            $table->decimal('overtime_hours', 5, 2)->default(0); // Horas extras trabajadas
            $table->decimal('bonuses', 10, 2)->default(0); // Total de bonos
            $table->decimal('tax', 10, 2)->default(0); // Total de impuestos
            $table->decimal('net_salary', 10, 2)->storedAs('base_salary + bonuses - tax'); // Salario final
            $table->enum('payment_status', ['Pendiente', 'Pagado'])->default('Pendiente'); // Estado de pago
            $table->date('payment_date')->nullable(); // Fecha de pago 

            // Definir clave foránea
            $table->foreign('employee_id')->references('id')->on('employees_data')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll');
    }
}

