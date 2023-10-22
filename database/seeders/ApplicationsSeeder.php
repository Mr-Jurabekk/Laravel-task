<?php

namespace Database\Seeders;

use App\Models\Applications;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Applications::Create([
           'user_id' => 1,
           'subject' => 'nimadir',
           'message' => 'haqida habar nimadir',
            'file_url' => 'www..uz',
        ]);

    }
}
