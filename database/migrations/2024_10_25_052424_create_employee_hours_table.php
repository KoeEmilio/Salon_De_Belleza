<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees_data')->onDelete('cascade');
            $table->date('date_worked')->nullable(); // Fecha de trabajo
            $table->time('start_time'); // Hora de inicio
            $table->time('end_time'); // Hora de fin
            $table->decimal('hours_worked', 5, 2)->virtualAs('TIMESTAMPDIFF(HOUR, start_time, end_time)')->nullable(); // Horas trabajadas calculadas
            $table->decimal('overtime_hours', 5, 2)->default(0); // Horas extras trabajadas
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
        Schema::dropIfExists('employee_hours');
    }
};
