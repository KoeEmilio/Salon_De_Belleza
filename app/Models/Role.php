<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'rol',
    ];

    // Relación con el modelo User a través de la tabla intermedia 'user_rol'
    public function users()
{
    return $this->belongsToMany(User::class, 'user_rol', 'rol', 'user');
}
}
