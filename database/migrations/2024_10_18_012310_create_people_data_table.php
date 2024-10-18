<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleDataTable extends Migration
{
    public function up()
    {
        Schema::create('people_data', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->string('last_name', 20);
            $table->integer('age');
            $table->enum('gender', ['H', 'M']);
            $table->char('phone', 10);
            $table->string('e_mail', 50); // Cambié a string para mejor compatibilidad
            $table->unsignedBigInteger('user_id')->nullable(); // Permitir que sea nulo

            // Definir clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('people_data');
    }
}
