<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'service',
        'price',
        'description',
        'duration',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(TypeService::class, 'type_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
