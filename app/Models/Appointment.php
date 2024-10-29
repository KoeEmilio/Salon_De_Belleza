<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'client_id',
        'sign_up_date',
        'appointment_day',
        'appointment_time',
        'status',
        'payment_type'
    ];

    public function client()
    {
        return $this->belongsTo(PeopleData::class, 'client_id');
    }

    // Relación con el modelo AppointmentService
    public function appointmentServices()
    {
        return $this->hasMany(AppointmentService::class);
    }

    // Relación con el modelo Service a través de AppointmentService
 // En el modelo Appointment.php
 public function services()
 {
     return $this->belongsToMany(Service::class, 'appointment_service', 'appointment_id', 'service_id');
 }

}
