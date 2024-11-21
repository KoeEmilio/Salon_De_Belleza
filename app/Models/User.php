<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];

    // Relación con Roles a través de la tabla intermedia 'user_rol'
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_rol', 'user', 'rol');
    }

    // Verificar si un usuario tiene un rol específico
    public function hasRole($role)
    {
        return $this->roles()->where('roles.rol', $role)->exists();
    }

    // Relación con el modelo PeopleData
    public function peopleData()
    {
        return $this->hasOne(PeopleData::class);
    }
}
