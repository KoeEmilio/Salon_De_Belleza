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

    public function client()
    {
        return $this->belongsTo(PeopleData::class, 'client_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    public function employee()
    {
        return $this->belongsTo(EmployeeData::class, 'employee_id');
    }

    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class, 'order_id');
    }
      public function appointments()
      {
          return $this->belongsToMany(Appointment::class, 'orders_appointments', 'order_id', 'appointment_id');
      }
       public function details()
       {
           return $this->hasMany(ServiceDetail::class, 'order_id');
       }
}
