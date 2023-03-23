<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Khon Hein',
            'email' =>'khonhein@gmail.com',
            'password' => Hash::make('123456789'),
            'phone' => '09893102188',
            'address'  => 'Pinlebu',
            'role' => 'admin',
        ]);
    }
}
