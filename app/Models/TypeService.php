<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    protected $table = 'type_service';

    protected $fillable = [
        'type'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'type_id');
    }
}
