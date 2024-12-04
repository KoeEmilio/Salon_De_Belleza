<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'client_id',
        'employee_id',
    ];

    // Relación con el cliente (una orden pertenece a un cliente)
    public function client()
    {
        return $this->belongsTo(PeopleData::class, 'client_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    // Relación con el empleado (una orden pertenece a un empleado)
    public function employee()
    {
        return $this->belongsTo(EmployeeData::class, 'employee_id');
    }

    // Relación con los detalles del servicio (una orden puede tener varios detalles de servicio)
    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class, 'order_id');
    }
      // Relación muchos a muchos con Appointment a través de la tabla intermedia 'orders_appointments'
      public function appointments()
      {
          return $this->belongsToMany(Appointment::class, 'orders_appointments', 'order_id', 'appointment_id');
      }
       // Relación con los detalles de la orden
       public function details()
       {
           return $this->hasMany(ServiceDetail::class, 'order_id');
       }
}
