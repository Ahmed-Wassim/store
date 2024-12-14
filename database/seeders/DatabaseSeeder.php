<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $superAdmin = User::create([
            'name' => 'Ahmed Wassim',
            'email' => 'ahmedwassim317@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        $vendor = User::create([
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        $vendor->store()->create([
            'name' => 'Vendor Store',
            'slug' => 'vendor-store',
            'description' => 'Vendor Store Description',
            'video' => 'https://youtu.be/hwP7WQkmECE?si=ytLRxte16Dvtvcq_',
        ]);

        $this->call([
            // UserSeeder::class,
            CategorySeeder::class,
            PermissionSeeder::class,
            RolesSeeder::class,
            SliderSeeder::class,
            ProductSeeder::class,
        ]);

        $superAdmin->assignRole('super admin');
        $admin->assignRole('admin');
        $vendor->assignRole('vendor');
    }
}