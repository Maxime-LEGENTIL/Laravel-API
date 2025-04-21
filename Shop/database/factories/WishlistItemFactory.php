<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistItemFactory extends Factory
{
    protected $model = WishlistItem::class;

    public function definition(): array
    {
        // Notes en français
        $notes = [
            'À acheter en priorité',
            'Attendre les soldes',
            'Vérifier la taille',
            'Demander l\'avis de Marie',
            'Comparer avec d\'autres modèles',
            'Pour l\'anniversaire de Paul',
            'Disponible en magasin ?',
            'Voir si la couleur me convient',
            null, null, null, null // Pour avoir parfois pas de note
        ];
        
        return [
            'wishlist_id' => Wishlist::factory(),
            'product_id' => Product::factory(),
            'notes' => $this->faker->randomElement($notes),
        ];
    }
}