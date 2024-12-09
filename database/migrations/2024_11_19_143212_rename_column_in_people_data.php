<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people_data', function (Blueprint $table) {
            DB::statement('ALTER TABLE people_data CHANGE COLUMN `name` `first_name` VARCHAR(15)');
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people_data', function (Blueprint $table) {
            DB::statement('ALTER TABLE people_data CHANGE COLUMN `first_name` `name` VARCHAR(255)');
        });
    }
};
