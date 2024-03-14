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
            'role' => 'admin',
            'name' => 'Admin Account',
            'email' => 'admin@c.c',
            'password' => '1234',
        ]);

        \App\Models\User::factory()->create([
            'role' => 'customer',
            'name' => 'Customer Account',
            'email' => 'customer@c.c',
            'password' => '1234',
        ]);

        \App\Models\User::factory()->create([
            'role' => 'customer',
            'name' => 'Customer 2 Account',
            'email' => 'customer2@c.c',
            'password' => '1234',
        ]);


    }
}
