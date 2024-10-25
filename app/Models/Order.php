<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'client_id',
        'employee_id',
        'service_id',
        'appointment'
    ];

    public function client()
    {
        return $this->belongsTo(PeopleData::class, 'client_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
