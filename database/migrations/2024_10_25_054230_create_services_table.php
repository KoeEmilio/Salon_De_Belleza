<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->char('service', 30); // Nombre del servicio
            $table->decimal('price', 10, 2); // Precio del servicio
            $table->text('description'); // Descripción del servicio
            $table->time('duration'); // Duración del servicio
            $table->unsignedBigInteger('type_id'); // ID del tipo de servicio
            $table->foreign('type_id')->references('id')->on('type_service'); // Relación con type_service
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
