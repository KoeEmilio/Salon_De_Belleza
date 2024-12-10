<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->id(); 
            
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->index('service_id'); 
            $table->unsignedBigInteger('hair_type_id');
            $table->foreign('hair_type_id')->references('id')->on('hair_type')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2)->storedAs('unit_price * quantity');
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('set null');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
            $table->index('order_id'); 

            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_details');
    }
}
