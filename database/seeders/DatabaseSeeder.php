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

        // \App\Models\Products::factory()->create([
        //     'product'  => 'CELLUCOR C4',
        //     'base_price' => '1550',
        //     'sell_price' => '1650',
        //     'quantity' => '50',
        //     'category' => 'Pre Workout',
        //     'image' => '/storage/images/WS_c4.jpg',
        //     'sold' => '0',
        //     'desc' => 'America’s Number 1 Selling Pre-Workout, Cellucor’s C4 is a trusted pre-workout for men and women of all training levels and has earned the title of America’s Number 1 Selling Pre-workout.',
        //     ]);


    }
}
