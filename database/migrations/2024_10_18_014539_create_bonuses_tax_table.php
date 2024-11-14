<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusesTaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses_tax', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees_data')->onDelete('cascade');
            $table->date('date_recorded');
            $table->enum('type', ['Bono', 'Impuesto']);
            $table->text('description');
            $table->decimal('amount', 10, 2);
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
        Schema::dropIfExists('bonuses_tax');
    }
}
