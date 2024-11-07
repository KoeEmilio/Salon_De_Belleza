<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleData extends Model
{
    use HasFactory;

    protected $table = 'people_data';

    protected $fillable = [
        'name', 
        'last_name', 
        'age', 
        'gender', 
        'phone', 
        'e_mail', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
}
