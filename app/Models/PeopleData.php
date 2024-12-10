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

    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_service', 'appointment_id', 'service_id','client_id','id');
    }

    public function employeeData()
    {
        return $this->hasOne(EmployeeData::class, 'person_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'owner_id');
    }

    public function serviceDetails()
    {
        return $this->hasManyThrough(ServiceDetail::class, Appointment::class, 'owner_id', 'appointment_id');
    }
}
