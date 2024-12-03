<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword; // Asegúrate de incluir este trait
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword; // Agrega CanResetPassword aquí

    /**
     * Los atributos que son asignables.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];

    /**
     * Relación con roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_rol', 'user', 'rol');
    }

    /**
     * Verificar si un usuario tiene un rol específico.
     */
    public function hasRole($role)
    {
        return $this->roles()->where('roles.rol', $role)->exists();
    }

    /**
     * Relación con PeopleData.
     */
    public function peopleData()
    {
        return $this->hasOne(PeopleData::class);
    }

    public function userRoles()
{
    return $this->hasMany(UserRol::class, 'user', 'id'); // 'user' es la columna en 'user_rol' que apunta a la tabla 'users'
}

}
