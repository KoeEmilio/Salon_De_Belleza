<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name', 30);
            $table->decimal('price', 10, 2); 
            $table->text('description'); 
            $table->time('duration');
            $table->unsignedBigInteger('type_id'); 
            $table->foreign('type_id')->references('id')->on('type_service')->onDelete('cascade'); // Foreign key a type_service
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
        Schema::dropIfExists('services');
    }
}
