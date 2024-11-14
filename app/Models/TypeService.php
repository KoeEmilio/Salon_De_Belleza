<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'type_service';

    // Campos que son asignables
    protected $fillable = [
        'type',
    ];
    public function services()
    {
        return $this->hasMany(Service::class, 'type_id'); // El 'type_id' es la clave foránea en la tabla services
    }   
}
