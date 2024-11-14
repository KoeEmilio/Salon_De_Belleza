<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAppointment extends Model
{
    protected $table = 'orders_appointments';

    // Relación con la orden (una relación de muchos a uno con la tabla orders)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Relación con la cita (una relación de muchos a uno con la tabla appointments)
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
