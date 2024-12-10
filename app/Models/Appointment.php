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
        return $this->belongsToMany(Service::class, 'service_details', 'appointment_id', 'service_id')
            ->withPivot(['quantity', 'unit_price', 'total_price']);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_appointments', 'appointment_id', 'order_id');
    }
    public function employees()
{
    return $this->belongsToMany(EmployeeData::class, 'appointment_employee', 'appointment_id', 'employee_id');
}
    
}
