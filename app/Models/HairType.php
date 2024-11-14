<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HairType extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'hair_type';

    // Campos que son asignables
    protected $fillable = [
        'type',
        'price',
    ];
      // Relación con los detalles de servicio (un tipo de cabello puede tener varios detalles de servicio)
      public function serviceDetails()
      {
          return $this->hasMany(ServiceDetail::class, 'hair_type_id');
      }
}
