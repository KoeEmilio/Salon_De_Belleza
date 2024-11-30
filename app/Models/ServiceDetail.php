<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $table = 'service_details';

    protected $fillable = [
        'service_id',
        'hair_type_id',
        'quantity',
        'unit_price',
 
        'appointment_id',
        'order_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function hairType()
    {
        return $this->belongsTo(HairType::class, 'hair_type_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function getTotalPriceAttribute()
    {
        return ($this->unit_price + $this->hairType->price) * $this->quantity;
    }

}
