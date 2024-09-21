<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'username' => fake()->userName(),
            'contact_num' => fake()->phoneNumber(),
            'street' => fake()->streetAddress(),
            'barangay' => fake()->word(), // Update as necessary for realistic data
            'municipality' => fake()->city(),
            'role' => fake()->randomElement(['customer', 'pharmacist', 'rider', 'admin']),
            'user_image' => fake()->imageUrl(640, 480, 'people'), // Adjust dimensions and category as needed
            'valid_id_num' => fake()->randomNumber(8), // Example format, adjust as necessary
            'valid_id_image' => fake()->imageUrl(640, 480, 'abstract'), // Adjust dimensions and category as needed
            'valid_id_type' => fake()->randomElement(['passport', 'driver_license', 'national_id']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
