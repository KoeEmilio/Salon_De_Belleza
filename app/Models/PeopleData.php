<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleData extends Model
{
    use HasFactory;

    protected $table = 'people_data'; // Definir el nombre de la tabla

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'phone',
        'user_id', // Relación con la tabla users
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Service a través de la tabla 'appointment_service'
    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_service', 'appointment_id', 'service_id','client_id','id');
    }

    // Relación con el modelo EmployeeData
    public function employeeData()
    {
        return $this->hasOne(EmployeeData::class, 'person_id');
    }

    // Relación con el modelo Appointment
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'owner_id');
    }

    // Relación indirecta con los detalles de servicio a través de las citas
    public function serviceDetails()
    {
        return $this->hasManyThrough(ServiceDetail::class, Appointment::class, 'owner_id', 'appointment_id');
    }
}
