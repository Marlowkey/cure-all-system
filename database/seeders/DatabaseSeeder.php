<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'contact_num' => fake()->phoneNumber(),
            'street' => fake()->streetAddress(),
            'barangay' => fake()->word(),
            'municipality' => fake()->city(),
        ]);

        User::factory(count: 20)->create();
    }
}
