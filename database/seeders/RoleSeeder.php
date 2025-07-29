<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create([
            'name' => 'super admin',
            'guard_name' => 'web',
            'label' => 'pengurusan',
            'description' => 'Pentadbir sistem',
        ]);

        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'label' => 'pengurusan',
            'description' => 'Pentadbir sistem',
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web',
            'label' => 'pengguna',
            'description' => 'Pengguna sistem',
        ]);

        // Assign permissions to super admin role
        $superAdminRole->givePermissionTo('users.index');
        $superAdminRole->givePermissionTo('users.create');
        $superAdminRole->givePermissionTo('users.edit');
        $superAdminRole->givePermissionTo('users.delete');

        // Assign permissions to admin role
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.create');
        $adminRole->givePermissionTo('users.edit');
    }
}
