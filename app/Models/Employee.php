<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees_data';

    protected $fillable = [
        'nss', 
        'curp', 
        'rfc', 
        'address', 
        'status', 
        'person_id', 
        'base_salary'
    ];


    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}

