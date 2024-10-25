<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeShiftTable extends Migration
{
    public function up()
    {
        Schema::create('employee_shift', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees_data'); // Relación con employees_data
            $table->string('day', 15); // Día de la semana
            $table->foreignId('shift_id')->constrained('shifts'); // Relación con shifts
            $table->timestamps(); // Campos de created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_shift');
    }
}
