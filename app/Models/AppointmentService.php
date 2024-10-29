<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentService extends Model
{
    use HasFactory;

    protected $table = 'appointment_service';

    protected $fillable = [
        'appointment_id',
        'service_id',
    ];

    // Relación con el modelo Appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    // Relación con el modelo Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
