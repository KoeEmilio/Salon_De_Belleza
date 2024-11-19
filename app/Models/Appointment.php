<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceDetail;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'sign_up_date',
        'appointment_day',
        'appointment_time',
        'owner_id',
        'status',
        'payment_type',
    ];

    public function owner()
    {
        return $this->belongsTo(PeopleData::class, 'owner_id');
    }

       // Relación con los detalles de servicio (una cita puede tener varios detalles de servicio)
        public function serviceDetails()
        {
            return $this->hasMany(ServiceDetail::class, 'appointment_id');
        }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_service', 'appointment_id', 'service_id');
    }
        // Relación muchos a muchos con Order a través de la tabla intermedia 'orders_appointments'
        public function orders()
        {
            return $this->belongsToMany(Order::class, 'orders_appointments', 'appointment_id', 'order_id');
        }
}