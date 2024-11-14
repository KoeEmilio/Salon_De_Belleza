<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeHoursTable extends Migration
{
    public function up()
    {
        Schema::create('employee_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees_data')->onDelete('cascade');
            $table->date('date_worked');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('hours_worked', 5, 2)->nullable();  // Sin el cálculo directo
            $table->decimal('overtime_hours', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_hours');
    }
}

