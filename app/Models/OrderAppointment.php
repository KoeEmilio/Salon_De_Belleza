<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAppointment extends Model
{
    protected $table = 'orders_appointments';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
