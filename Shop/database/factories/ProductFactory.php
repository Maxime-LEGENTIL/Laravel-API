<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true), // ex: "Super Wireless Mouse"
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 5, 500), // ex: 49.99
            'stock' => $this->faker->numberBetween(0, 100),
            'sku' => strtoupper($this->faker->bothify('???-#####')), // ex: "PRD-12345"
        ];
    }
}
