<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword; 


    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];

   
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_rol', 'user', 'rol');
    }


    public function hasRole($role)
    {
        return $this->roles()->where('roles.rol', $role)->exists();
    }

 
    public function peopleData()
    {
        return $this->hasOne(PeopleData::class);
    }

    public function userRoles()
{
    return $this->hasMany(UserRol::class, 'user', 'id');
}

}
