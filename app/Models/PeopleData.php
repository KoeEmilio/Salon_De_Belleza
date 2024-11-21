<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleData extends Model
{
    use HasFactory;

    protected $table = 'people_data';

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'phone',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function clientes()
{
    $clientes = PeopleData::with(['services'])->get();
    return view('clientes_recepcionista', compact('clientes'));
}
    public function services()
{
    return $this->hasManyThrough(Service::class, Appointment::class, 'people_data_id', 'id', 'id', 'service_id')
        ->join('appointment_service', 'appointments.id', '=', 'appointment_service.appointment_id')
        ->select('services.*'); 
}
public function employeeData()
{
    return $this->hasOne(EmployeeData::class, 'person_id');
}
public function appointments()
{
    return $this->hasMany(Appointment::class, 'owner_id'); // 'owner_id' es la clave foránea en appointments
}
  // Relación indirecta con los detalles de servicio (a través de las citas)
  public function serviceDetails()
  {
      return $this->hasManyThrough(ServiceDetail::class, Appointment::class, 'owner_id', 'appointment_id');
  }
}
