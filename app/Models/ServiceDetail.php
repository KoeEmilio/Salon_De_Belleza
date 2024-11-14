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

    // Relación con el modelo Service (Un detalle de servicio pertenece a un servicio)
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // Relación con el modelo HairType (Un detalle de servicio tiene un tipo de cabello)
    public function hairType()
    {
        return $this->belongsTo(HairType::class, 'hair_type_id');
    }

    // Relación con el modelo Appointment (Un detalle de servicio puede tener una cita asociada)
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    // Relación con el modelo Order (Un detalle de servicio puede tener un pedido asociado)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
