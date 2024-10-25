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
        Schema::create('payroll_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payroll_id');
            $table->foreign('payroll_id')->references('id')->on('payroll')->onDelete('cascade');
            $table->date('payment_date'); // Fecha de pago
            $table->decimal('payment_amount', 10, 2); // Monto del pago
            $table->enum('payment_method', ['Transferencia', 'Efectivo', 'Cheque']); // Método de pago
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
        Schema::dropIfExists('payroll_payments');
    }
};
