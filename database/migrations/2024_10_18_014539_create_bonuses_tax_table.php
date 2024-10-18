<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusesTaxTable extends Migration
{
    public function up()
    {
        Schema::create('bonuses_tax', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id'); // Clave foránea para el empleado
            $table->date('date_recorded'); // Fecha del bono o impuesto
            $table->enum('type', ['Bono', 'impuesto']); // Tipo de bono o impuesto
            $table->text('description'); // Descripción
            $table->decimal('amount', 10, 2); // Monto

            // Definir clave foránea
            $table->foreign('employee_id')->references('id')->on('employees_data')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bonuses_tax');
    }
}
