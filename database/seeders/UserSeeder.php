<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'Sample User 1',
            'email' => 'sample1@gmail.com',
            'password' => bcrypt('password'), // Hash::make('password') juga boleh digunakan
            'phone' => '0123456789',
            'status' => 'active',
        ]);

        $user->assignRole('super admin');

        // Simpan rekod sample user 2 menerusi Query Builder
        $user2 = User::create([
            'name' => 'Sample User 2',
            'email' => 'sample2@gmail.com',
            'password' => bcrypt('password'), // Hash::make('password') juga boleh digunakan
            'phone' => '0987654321',
            'status' => 'inactive',
        ]);

        $user2->assignRole('admin');

        // Simpan rekod sample user 3 menerusi Query Builder
        $user3 = User::create([
            'name' => 'Sample User 3',
            'email' => 'sample3@gmail.com',
            'password' => bcrypt('password'), // Hash::make('password') juga boleh digunakan
            'phone' => '0112233445',
            'status' => 'active',
        ]);

        $user3->assignRole('user');

        // Panggil UserFactory untuk membuat 100 rekod sample user 4-13
        User::factory()->count(1000)->create();
    }
}
