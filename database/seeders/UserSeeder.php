<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ 
            'name' => 'Emilio',
            'email' => 'Emilio@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), 
            'remember_token' => Str::random(10)
        ]);
    }
}
