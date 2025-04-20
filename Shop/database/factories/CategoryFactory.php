<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            ['name' => 'Électronique', 'icon' => '📱'],
            ['name' => 'Mode Femme', 'icon' => '👗'],
            ['name' => 'Mode Homme', 'icon' => '👔'],
            ['name' => 'Maison & Jardin', 'icon' => '🏡'],
            ['name' => 'Sports & Loisirs', 'icon' => '🏄'],
            ['name' => 'Beauté & Bien-être', 'icon' => '💄'],
            ['name' => 'Enfants & Bébés', 'icon' => '🧸'],
            ['name' => 'Auto & Moto', 'icon' => '🚗'],
            ['name' => 'Livres & Médias', 'icon' => '📚'],
            ['name' => 'Alimentation', 'icon' => '🍎'],
            ['name' => 'Gaming', 'icon' => '🎮'],
            ['name' => 'Musique', 'icon' => '🎵'],
            ['name' => 'Animalerie', 'icon' => '🐾'],
            ['name' => 'Bricolage', 'icon' => '🛠️'],
            ['name' => 'Décoration', 'icon' => '🖼️'],
            ['name' => 'Voyages', 'icon' => '✈️'],
            ['name' => 'High-Tech', 'icon' => '💻'],
            ['name' => 'Cuisine', 'icon' => '🍽️'],
        ];

        $category = $this->faker->randomElement($categories);

        return [
            'name' => $category['name'],
            'slug' => Str::slug($category['name']),
            'description' => $this->faker->sentence(),
            'icon' => $category['icon'],
        ];
    }
}
