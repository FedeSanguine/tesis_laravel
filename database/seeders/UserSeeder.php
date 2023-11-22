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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'email' => 'fede3828@gmail.com',
                'password' => Hash::make('123456'),
                'remember_token' => null,
                'rol' => 'administrador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'email' => 'fede@gmail.com',
                'password' => Hash::make('123456'),
                'remember_token' => null,
                'rol' => 'usuario',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
