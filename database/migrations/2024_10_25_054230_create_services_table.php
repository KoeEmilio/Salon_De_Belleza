<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name', 30); // Nombre del servicio
            $table->decimal('price', 10, 2); // Precio del servicio
            $table->text('description'); // Descripción del servicio
            $table->time('duration'); // Duración del servicio
            $table->unsignedBigInteger('type_id'); // Relación con tipo de servicio
            $table->foreign('type_id')->references('id')->on('type_service')->onDelete('cascade'); // Foreign key a type_service
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
        Schema::dropIfExists('services');
    }
}
