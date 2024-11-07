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

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
