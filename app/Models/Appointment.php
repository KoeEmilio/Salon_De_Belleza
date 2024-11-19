<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceDetail;
use Illuminate\Support\Carbon;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->sign_up_date)) {
                $model->sign_up_date = Carbon::now();
            }
        });
    }

    public function owner()
    {
        return $this->belongsTo(PeopleData::class, 'owner_id');  
    }

    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class, 'appointment_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_id', 'service_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_appointments', 'appointment_id', 'order_id');
    }
}
