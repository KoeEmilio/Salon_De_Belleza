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
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees_data')->onDelete('cascade');
            $table->date('date_recorded');
            $table->enum('type', ['Bono', 'impuesto']);
            $table->text('description');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bonuses_tax');
    }
}
