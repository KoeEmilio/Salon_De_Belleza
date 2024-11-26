<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayrollPaymentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('payroll_payments')->insert([
            [
                'payroll_id' => 1,
                'payment_date' => '2024-11-15',
                'payment_amount' => 0.00,
                'payment_method' => 'Transferencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payroll_id' => 2,
                'payment_date' => '2024-11-16',
                'payment_amount' => 0.00,
                'payment_method' => 'Efectivo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payroll_id' => 3,
                'payment_date' => '2024-11-17',
                'payment_amount' => 0.00,
                'payment_method' => 'Cheque',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payroll_id' => 4,
                'payment_date' => '2024-11-18',
                'payment_amount' => 0.00,
                'payment_method' => 'Transferencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payroll_id' => 5,
                'payment_date' => '2024-11-19',
                'payment_amount' => 0.00,
                'payment_method' => 'Efectivo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payroll_id' => 6,
                'payment_date' => '2024-11-20',
                'payment_amount' => 0.00,
                'payment_method' => 'Cheque',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payroll_id' => 7,
                'payment_date' => '2024-11-21',
                'payment_amount' => 0.00,
                'payment_method' => 'Transferencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payroll_id' => 8,
                'payment_date' => '2024-11-22',
                'payment_amount' => 0.00,
                'payment_method' => 'Efectivo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
