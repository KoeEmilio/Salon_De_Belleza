<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    use HasFactory;

    // Define el nombre de la tabla intermedia
    protected $table = 'user_rol';

    // Define las claves foráneas para las relaciones
    protected $fillable = [
        'user',  // Clave foránea para la relación con el usuario
        'rol',   // Clave foránea para la relación con el rol
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user'); // 'user' es la clave foránea en la tabla 'user_rol'
    }

    // Relación con el modelo Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol'); // 'rol' es la clave foránea en la tabla 'user_rol'
    }
}
