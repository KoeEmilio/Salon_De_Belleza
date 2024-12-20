<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
       'service_name',
        'price',
        'description',
        'duration',
        'type_id',
    ];
    public function typeService()
    {
        return $this->belongsTo(TypeService::class, 'type_id');
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'service_details', 'service_id', 'appointment_id')
            ->withPivot(['quantity', 'unit_price', 'total_price']);
    }


    public function hairType()
    {
        return $this->belongsToMany(HairType::class, 'service_details', 'service_id', 'hair_type_id')
            ->withPivot(['quantity', 'unit_price', 'total_price']);
    }

    public function client()
    {
        return $this->belongsTo(PeopleData::class, 'client_id');
    }
    public function peopleData()
    {
        return $this->belongsTo(PeopleData::class, 'people_data_id'); 
    }
    public function details()
    {
        return $this->hasMany(DetailOrder::class, 'service_id');
    }
}
