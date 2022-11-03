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
            'name'       => 'Admin Tracer Study',
            'email'      => 'admin@email.com',
            'password'   => Hash::make('password'),
            'user_id'    => 0,
            'role'       => 'ADMIN',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
