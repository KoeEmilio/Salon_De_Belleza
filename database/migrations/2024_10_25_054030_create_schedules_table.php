<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('day', 10); // Día de la semana
            $table->time('opening_time')->nullable(); // Hora de apertura
            $table->time('closing_time')->nullable(); // Hora de cierre
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
