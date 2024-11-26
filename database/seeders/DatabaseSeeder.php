<?php

namespace Database\Seeders;

use App\Models\EmployeeData;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{
    $this->call([
        RoleSeeder::class,
        UserSeeder::class,
        PeopleDataSeeder::class,
        EmployeesDataSeeder::class,
        ShiftSeeder::class,
        EmployeeShiftSeeder::class,
        EmployeeHoursSeeder::class,
        BonusTaxSeeder::class,
        PayrollSeeder::class,
        PayrollPaymentsSeeder::class,
        SchedulesSeeder::class,
        TypeServiceSeeder::class,
        ServicesSeeder::class,
        HairTypeSeeder::class,
        OrdersSeeder::class,
        AppointmentsSeeder::class,
        OrdersAppointmentsSeeder::class,
        ServiceDetailsSeeder::class,
        DetailOrdersSeeder::class,
    ]);
}
}
