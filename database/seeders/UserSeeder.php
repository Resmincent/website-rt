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
        DB::table('users')->updateOrInsert(
            [
                'email' => 'admin@gmail.com',
                'name' => 'owner',
                'role' => 'admin',
                'jenis_kelamin' => 'Laki-laki',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
            ]
        );
    }
}
