<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Auth;
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
            'name' => fake()->sentence(),
            'price' => fake()->randomNumber(),
            'description' => fake()->text(),
            'category_id' => fake()->numberBetween(1, 10),
            'store_id' => 1,
            'quantity' => fake()->numberBetween(10, 70)
        ];
    }
}
