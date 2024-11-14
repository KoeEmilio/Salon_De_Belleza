<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
       'service_name',
        'price',
        'description',
        'duration',
        'type_id',
    ];
    public function typeService()
    {
        return $this->belongsTo(TypeService::class, 'type_id');
    }

 

    // Relación con el modelo Appointment a través de AppointmentService
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_service', 'service_id', 'appointment_id');
    }
    public function appointment()
    {
    return $this->belongsTo(Appointment::class);
    }

    public function peopleData()
    {
        return $this->belongsTo(PeopleData::class, 'people_data_id'); // Asegúrate de usar la clave foránea correcta si es necesario
    }
    public function details()
    {
        return $this->hasMany(DetailOrder::class, 'service_id');
    }
}
