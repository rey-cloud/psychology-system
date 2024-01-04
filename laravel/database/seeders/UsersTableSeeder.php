<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birth_date' => '2000-01-01',
            'email' => 'john.doe@example.com',
            'pass' => bcrypt('password'),
            'type' => 'user',
            'otp' => null,
        ]);
    }
}