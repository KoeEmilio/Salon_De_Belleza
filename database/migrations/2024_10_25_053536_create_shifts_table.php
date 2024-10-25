<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('shift', 20); // Nombre del turno
            $table->time('entry_time'); // Hora de entrada
            $table->time('exit_time'); // Hora de salida
            $table->timestamps(); // Campos de created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}
