<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        // Commentaires français positifs et négatifs
        $commentairesPositifs = [
            "Excellent produit, très satisfait !",
            "La qualité est vraiment au rendez-vous.",
            "Je recommande vivement ce produit.",
            "Rapport qualité-prix imbattable.",
            "Livraison rapide et produit conforme à la description.",
            "Je suis très content de mon achat.",
            "Un must-have absolu dans sa catégorie.",
            "Au-delà de mes attentes, vraiment impressionné.",
            "Parfait en tous points.",
            "Service client exemplaire et produit de qualité."
        ];
        
        $commentairesNegatifs = [
            "Déçu par la qualité, je m'attendais à mieux.",
            "Ne correspond pas du tout à la description.",
            "Problème de durabilité, s'est cassé rapidement.",
            "Rapport qualité-prix médiocre.",
            "Finitions approximatives.",
            "Ne vaut pas son prix.",
            "Livraison très lente et produit décevant.",
            "Je ne recommande pas du tout.",
            "Bien en-deçà de mes attentes.",
            "Service après-vente inexistant."
        ];
        
        $rating = $this->faker->numberBetween(1, 5);
        $comment = $rating >= 4 
            ? $this->faker->randomElement($commentairesPositifs) 
            : $this->faker->randomElement($commentairesNegatifs);
            
        if ($this->faker->boolean(40)) {
            $comment .= "\n\n" . $this->faker->paragraph();
        }
        
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'order_id' => $this->faker->boolean(80) ? Order::factory() : null,
            'rating' => $rating,
            'comment' => $comment,
            'is_verified_purchase' => $this->faker->boolean(70),
            'is_approved' => $this->faker->boolean(90),
        ];
    }
    
    public function verified(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'is_verified_purchase' => true,
                'order_id' => Order::factory(),
            ];
        });
    }
    
    public function positive(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => $this->faker->numberBetween(4, 5),
            ];
        });
    }
    
    public function negative(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => $this->faker->numberBetween(1, 2),
            ];
        });
    }
}