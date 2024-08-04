<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        Admin::create([
            'name' => 'Admin Payaman',
            'role' => 'admin',
            'username' => 'adminpayaman',
            'email' => 'payaman@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
