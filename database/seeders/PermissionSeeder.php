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
        Permission::create(['name' => 'view dashboard']);

        Permission::create(['name' => 'view category']);

        Permission::create(['name' => 'create category']);

        Permission::create(['name' => 'update category']);

        Permission::create(['name' => 'delete category']);
    }
}
