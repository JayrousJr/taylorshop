<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Joshua Jayrous',
            'email' => 'joshuajayrous@gmail.com',
            'password' => bcrypt('password'),
            'phone' => "+255 754 219539",
            'position' => 'System Administrator',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Maombi',
            'email' => 'maombi@gmail.com',
            'password' => bcrypt('password'),
            'phone' => "+1 619 261-3807",
            'position' => 'Shop Owner',
        ]);
    }
}
