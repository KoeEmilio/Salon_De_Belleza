<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHairTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hair_type', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20); // Tipo de cabello
            $table->decimal('price', 5, 2); // Precio asociado al tipo de cabello
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
        Schema::dropIfExists('hair_type');
    }
}
