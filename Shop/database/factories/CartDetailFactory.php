<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartDetailFactory extends Factory
{
    protected $model = CartDetail::class;

    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 5, 200);
        $quantity = $this->faker->numberBetween(1, 5);
        $discount = $this->faker->boolean(20) ? $price * $this->faker->randomFloat(2, 0.05, 0.2) : 0;
        
        // Générer les attributs et les convertir en JSON
        $attributes = $this->faker->boolean(50) ? json_encode($this->generateAttributes()) : null;
        
        return [
            'cart_id' => Cart::factory(),
            'product_id' => Product::factory(),
            'quantity' => $quantity,
            'price' => $price,
            'discount' => $discount,
            'attributes' => $attributes,
        ];
    }
    
    private function generateAttributes(): array
    {
        $attributes = [];
        
        // Couleurs en français
        $couleurs = ['Rouge', 'Bleu', 'Noir', 'Blanc', 'Vert', 'Jaune', 'Gris', 'Marron', 'Violet', 'Rose'];
        
        // Tailles en français
        $tailles = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        
        if ($this->faker->boolean(70)) {
            $attributes['couleur'] = $this->faker->randomElement($couleurs);
        }
        
        if ($this->faker->boolean(60)) {
            $attributes['taille'] = $this->faker->randomElement($tailles);
        }
        
        return $attributes;
    }
}