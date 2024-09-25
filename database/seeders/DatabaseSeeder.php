<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'User One',
            'email' => 'user@gmail.com',
            'password' => Hash::make(123456),
            'role' => 'user'
        ]);

        \App\Models\User::create([
            'name' => 'Admin Boss',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456),
            'role' => 'admin'
        ]);
    }
}
