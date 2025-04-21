<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

    public function definition(): array
    {
        // Noms de listes de souhaits en français
        $nomsDeListes = [
            'Ma liste d\'envies',
            'Pour plus tard',
            'Idées cadeaux',
            'Articles favoris',
            'À acheter prochainement',
            'Pour la maison',
            'Liste d\'anniversaire',
            'Liste de mariage',
            'Noël',
            'Black Friday'
        ];
        
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->randomElement($nomsDeListes),
            'is_public' => $this->faker->boolean(20),
        ];
    }
    
    public function public(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'is_public' => true,
            ];
        });
    }
    
    public function private(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'is_public' => false,
            ];
        });
    }
}