<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('employee_hours', function (Blueprint $table) {
        $table->time('start_time')->after('date_worked'); // Hora de inicio
        $table->time('end_time')->after('start_time'); // Hora de fin
        $table->decimal('hours_worked', 5, 2)->virtualAs('TIMESTAMPDIFF(HOUR, start_time, end_time)')->after('end_time')->nullable(); // Horas trabajadas calculadas
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_hours', function (Blueprint $table) {
            //
        });
    }
};
