<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'       => 'Admin Tracer Study',
                'email'      => 'amiruddin@iaialaziziyah.ac.id',
                'password'   => Hash::make('S4m4l4ng4'),
                'user_id'    => 0,
                'role'       => 'ADMIN',
                'username'   => '828',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Admin Tracer Study',
                'email'      => 'zahrulfuadi@iaialaziziyah.ac.id',
                'password'   => Hash::make('S4m4l4ng4'),
                'user_id'    => 0,
                'role'       => 'ADMIN',
                'username'   => '848',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Admin Tracer Study',
                'email'      => 'firman@iaialaziziyah.ac.id',
                'password'   => Hash::make('S4m4l4ng4'),
                'user_id'    => 0,
                'role'       => 'ADMIN',
                'username'   => '838',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Admin Tracer Study',
                'email'      => 'admin@tracerstudy.iaialaziziyah.ac.id',
                'password'   => Hash::make('AdminTracerStudy!'),
                'user_id'    => 0,
                'role'       => 'ADMIN',
                'username'   => '858',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
