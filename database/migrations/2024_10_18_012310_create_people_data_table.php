<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_data', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->string('last_name', 20);
            $table->integer('age');
            $table->enum('gender', ['H', 'M'])->nullable();
            $table->char('phone', 10);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('people_data');
    }
}
