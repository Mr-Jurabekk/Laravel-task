<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name'=>'Ali',
            'role_id' => 1,
            'email' => 'Ali@gmail.com',
            'password'=>Hash::make('parol'),
        ]);

        User::Create([
           'name' => 'Vali',
           'role_id' => 2,
           'email' => 'Vali@gmail.com',
           'password' => Hash::make('parol'),
        ]);
    }
}
