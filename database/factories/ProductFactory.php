<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $number = $this->faker->randomNumber();
        return [
            'title' => "Product#$number",
            'price' => round($this->faker->randomFloat(2, 100, 9999), 3),
        ];
    }
}
