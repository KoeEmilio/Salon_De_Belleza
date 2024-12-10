<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HairType extends Model
{
    use HasFactory;

    protected $table = 'hair_type';

    protected $fillable = [
        'type',
        'price',
    ];
      public function serviceDetails()
      {
          return $this->hasMany(ServiceDetail::class, 'hair_type_id');
      }
      public function services()
    {
        return $this->belongsToMany(Service::class, 'service_details', 'hair_type_id', 'service_id');
    }
}
