<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesDataTable extends Migration
{
    public function up()
    {
        Schema::create('employees_data', function (Blueprint $table) {
            $table->id();
            $table->string('nss', 20)->nullable(); // NSS puede ser nulo si no se proporciona
            $table->string('curp', 18)->nullable(); // CURP puede ser nulo si no se proporciona
            $table->string('rfc', 13)->nullable(); // RFC puede ser nulo si no se proporciona
            $table->string('address', 255)->nullable(); // Dirección puede ser nula
            $table->enum('status', ['Activo', 'Inactivo'])->default('Activo');
            $table->unsignedBigInteger('person_id')->nullable(); // Permitir que sea nulo
            $table->decimal('base_salary', 10, 2); // Salario base del empleado
            
            // Definir clave foránea
            $table->foreign('person_id')->references('id')->on('people_data')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees_data');
    }
}
