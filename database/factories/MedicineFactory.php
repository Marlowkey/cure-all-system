<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->unique()->randomNumber(8),
            'description' => $this->faker->sentence,
            'brand' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 1, 500),
            'quantity' => $this->faker->randomNumber(2),
            'image_path' => $this->faker->imageUrl(640, 480, 'medicine', true),
        ];
    }
}
