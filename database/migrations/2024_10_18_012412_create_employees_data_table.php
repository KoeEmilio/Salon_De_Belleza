<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_data', function (Blueprint $table) {
            $table->id();
            $table->string('nss', 20)->nullable();
            $table->string('curp', 18)->nullable();
            $table->string('rfc', 13)->nullable();
            $table->string('address', 255)->nullable();
            $table->enum('status', ['Activo', 'Inactivo'])->default('Activo');
            $table->foreignId('person_id')->constrained('people_data')->onDelete('cascade');
            $table->decimal('base_salary', 10, 2);
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
        Schema::dropIfExists('employees_data');
    }
}
