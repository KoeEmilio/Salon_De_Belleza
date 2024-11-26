<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceDetail;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sign_up_date',
        'appointment_day',
        'appointment_time',
        'owner_id',
        'status', 
        'payment_type',
    ];

    // Relación con el modelo PeopleData (dueño de la cita)
    public function owner()
    {
        return $this->belongsTo(PeopleData::class, 'owner_id'); // Cambiar a PeopleData::class
    }

    // Relación con los detalles de servicio
    public function serviceDetails()
    {
        return $this->hasMany(ServiceDetail::class, 'appointment_id');
    }

    // Relación con los servicios
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_details', 'appointment_id', 'service_id')
            ->withPivot(['quantity', 'unit_price', 'total_price']);
    }

    // Relación con las órdenes
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_appointments', 'appointment_id', 'order_id');
    }
}
