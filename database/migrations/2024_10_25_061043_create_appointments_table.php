<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); 
            $table->timestamp('sign_up_date')->useCurrent(); 
            $table->date('appointment_day'); 
            $table->time('appointment_time'); 
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->enum('status', ['pendiente', 'cancelada', 'confirmada'])->default('pendiente'); 
            $table->enum('payment_type', ['efectivo', 'transferencia'])->nullable();
            $table->foreign('owner_id')->references('id')->on('people_data')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}