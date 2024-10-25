<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->unsignedBigInteger('order_id'); // ID de la orden
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // Relación con orders
            $table->unsignedBigInteger('service_id'); // ID del servicio
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade'); // Relación con services
            $table->text('description'); // Descripción del detalle de la orden
            $table->integer('quantity'); // Cantidad del servicio
            $table->decimal('unit_price', 10, 2); // Precio unitario
            $table->decimal('total_price', 10, 2)->storedAs('quantity * unit_price'); // Precio total
            $table->decimal('total_amount', 10, 2); // Monto total
            $table->unsignedBigInteger('appointment_id'); // ID de la cita
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade'); // Relación con appointments
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_orders');
    }
}
