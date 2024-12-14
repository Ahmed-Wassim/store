<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'super admin']);

        $admin = Role::create(['name' => 'admin']);

        $vendor = Role::create(['name' => 'vendor']);

        $admin->givePermissionTo('view dashboard');
        $admin->givePermissionTo('view category');
        $admin->givePermissionTo('create category');
        $admin->givePermissionTo('update category');
        $admin->givePermissionTo('delete category');
    }
}
