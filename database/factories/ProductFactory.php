<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 0, 100),
            'stock' => fake()->randomNumber(2, 0, 100),
            'category' => fake()->randomElement(['food','drink','snack']),
            'image' => fake()->imageUrl(),
        ];
    }
}
