<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        Permission::create([
            'name' => 'users.index', 
            'label' => 'Modul Users', 
            'description' => 'Kebenaran untuk melihat senarai users',
        ]);
        
        
        Permission::create([
            'name' => 'users.create',
            'label' => 'Modul Users',
            'description' => 'Kebenaran untuk mendaftarkan user baru',
        ]);


        Permission::create([
            'name' => 'users.edit',
            'label' => 'Modul Users',
            'description' => 'Kebenaran untuk mengedit user',
        ]);


        Permission::create([
            'name' => 'users.delete',
            'label' => 'Modul Users',
            'description' => 'Kebenaran untuk menghapus user',
        ]);
    }
}
