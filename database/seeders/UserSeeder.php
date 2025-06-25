<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Simpan rekod sample user 1 menerusi Query Builder
        DB::table('users')->insert([
            'name' => 'Sample User 1',
            'email' => 'sample1@gmail.com',
            'password' => bcrypt('password'), // Hash::make('password') juga boleh digunakan
            'phone' => '0123456789',
            'status' => 'active',
        ]);

        // Simpan rekod sample user 2 menerusi Query Builder
        DB::table('users')->insert([
            'name' => 'Sample User 2',
            'email' => 'sample2@gmail.com',
            'password' => bcrypt('password'), // Hash::make('password') juga boleh digunakan
            'phone' => '0987654321',
            'status' => 'inactive',
        ]);

        // Simpan rekod sample user 3 menerusi Query Builder
        DB::table('users')->insert([
            'name' => 'Sample User 3',
            'email' => 'sample3@gmail.com',
            'password' => bcrypt('password'), // Hash::make('password') juga boleh digunakan
            'phone' => '0112233445',
            'status' => 'active',
        ]);
    }
}
