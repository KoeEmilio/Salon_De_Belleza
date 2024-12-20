<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BonusTax;
use Carbon\Carbon;

class BonusTaxSeeder extends Seeder
{
    public function run()
    {
      
        BonusTax::create([
            'employee_id' => 1, 
            'date_recorded' => Carbon::now()->subDays(10),
            'type' => 'Bono',
            'description' => 'Bonificación por buen desempeño',
            'amount' => 1000.00
        ]);

        BonusTax::create([
            'employee_id' => 2,
            'date_recorded' => Carbon::now()->subDays(15),
            'type' => 'Bono',
            'description' => 'Bonificación por metas alcanzadas',
            'amount' => 800.00
        ]);

        BonusTax::create([
            'employee_id' => 3,
            'date_recorded' => Carbon::now()->subDays(5),
            'type' => 'Bono',
            'description' => 'Bonificación mensual',
            'amount' => 600.00
        ]);

        BonusTax::create([
            'employee_id' => 4, 
            'date_recorded' => Carbon::now()->subDays(12),
            'type' => 'Bono',
            'description' => 'Bonificación por jornada extendida',
            'amount' => 500.00
        ]);

        BonusTax::create([
            'employee_id' => 5, 
            'date_recorded' => Carbon::now()->subDays(8),
            'type' => 'Impuesto',
            'description' => 'Deducción por impuestos federales',
            'amount' => 150.00
        ]);

        BonusTax::create([
            'employee_id' => 6, 
            'date_recorded' => Carbon::now()->subDays(20),
            'type' => 'Impuesto',
            'description' => 'Impuesto sobre la renta',
            'amount' => 200.00
        ]);

        BonusTax::create([
            'employee_id' => 7, 
            'date_recorded' => Carbon::now()->subDays(30),
            'type' => 'Impuesto',
            'description' => 'Deducción por impuestos municipales',
            'amount' => 180.00
        ]);

        BonusTax::create([
            'employee_id' => 8,
            'date_recorded' => Carbon::now()->subDays(25),
            'type' => 'Bono',
            'description' => 'Bono por servicio al cliente',
            'amount' => 500.00
        ]);
    }
}
