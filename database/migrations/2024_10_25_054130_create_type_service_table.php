<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeServiceTable extends Migration
{
    public function up()
    {
        Schema::create('type_service', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->char('type', 30); // Tipo de servicio
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_service');
    }
}
