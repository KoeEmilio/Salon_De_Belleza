<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleData extends Model
{
    use HasFactory;

    protected $table = 'people_data';

    protected $fillable = [
        'name', 
        'last_name', 
        'age', 
        'gender', 
        'phone', 
        'e_mail', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
