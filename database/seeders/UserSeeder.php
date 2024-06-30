<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'alamat' => 'Jl Pendongkelan',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'merchant',
                'username' => 'merchant',
                'email' => 'merchant@gmail.com',
                'alamat' => 'Jl Bhakti',
                'role' => 'merchant',
                'status' => 'active',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
