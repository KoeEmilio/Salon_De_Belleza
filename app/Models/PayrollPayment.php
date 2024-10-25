<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollPayment extends Model
{
    protected $table = 'payroll_payments';

    protected $fillable = [
        'payroll_id',
        'payment_date',
        'payment_amount',
        'payment_method'
    ];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}
