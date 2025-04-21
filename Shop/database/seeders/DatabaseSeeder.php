<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
//use App\Models\OrderItem;
use App\Models\PaymentStatus;
use App\Models\Product;
//use App\Models\ProductImage;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un utilisateur administrateur
        User::factory()->create([
            'name' => 'Maxime LE GENTIL',
            'email' => 'admin@admin.com',
        ]);

        // Création des autres utilisateurs
        User::factory(50)->create();

        // Création des marques
        Brand::factory(25)->create();

        // Création des catégories
        Category::factory(100)->create();

        // Création des produits
        $products = Product::factory(100)->create();

        // Création des images pour chaque produit
        /*foreach ($products as $product) {
            // Une image principale
            ProductImage::factory()->primary()->create([
                'product_id' => $product->id
            ]);
            
            // 2 à 5 images secondaires
            ProductImage::factory()
                ->secondary()
                ->count(rand(2, 5))
                ->create([
                    'product_id' => $product->id
                ]);
        }*/

        // Création des statuts de paiement
        PaymentStatus::factory(23)->create();

        // Création des commandes
        $orders = Order::factory(100)->create();

        // Création des éléments de commande
        /*foreach ($orders as $order) {
            // 1 à 5 articles par commande
            $productCount = rand(1, 5);
            $orderProducts = $products->random($productCount);
            
            foreach ($orderProducts as $product) {
                OrderItem::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $product->id
                ]);
            }
        }*/

        // Création des coupons de réduction
        Coupon::factory(15)->create();

        // Création des adresses
        foreach (User::all() as $user) {
            // 1 ou 2 adresses par utilisateur
            $addressCount = rand(1, 2);
            Address::factory()->count($addressCount)->create([
                'user_id' => $user->id
            ]);
        }

        // Création des paniers
        $carts = Cart::factory(30)->create();

        // Ajout d'articles aux paniers
        foreach ($carts as $cart) {
            // 1 à 3 produits par panier
            $cartProductCount = rand(1, 3);
            $cartProducts = $products->random($cartProductCount);
            
            foreach ($cartProducts as $product) {
                CartDetail::factory()->create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id
                ]);
            }
        }

        // Création de quelques paniers d'invités
        Cart::factory(10)->guest()->create()->each(function ($cart) use ($products) {
            // 1 à 2 produits par panier d'invité
            $cartProductCount = rand(1, 2);
            $cartProducts = $products->random($cartProductCount);
            
            foreach ($cartProducts as $product) {
                CartDetail::factory()->create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id
                ]);
            }
        });

        // Création des listes de souhaits
        $users = User::all();
        foreach ($users as $user) {
            if (rand(0, 1)) { // 50% des utilisateurs ont une liste de souhaits
                $wishlist = Wishlist::factory()->create([
                    'user_id' => $user->id
                ]);
                
                // 1 à 8 produits dans chaque liste
                $wishlistProductCount = rand(1, 8);
                $wishlistProducts = $products->random($wishlistProductCount);
                
                foreach ($wishlistProducts as $product) {
                    WishlistItem::factory()->create([
                        'wishlist_id' => $wishlist->id,
                        'product_id' => $product->id
                    ]);
                }
            }
        }

        // Création des avis produits
        foreach ($products->random(70) as $product) { // 70% des produits ont des avis
            // 0 à 15 avis par produit
            $reviewCount = rand(0, 15);
            $reviewUsers = $users->random(min($reviewCount, count($users)));
            
            foreach ($reviewUsers as $user) {
                Review::factory()->create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'order_id' => Order::where('user_id', $user->id)->inRandomOrder()->first()?->id
                ]);
            }
        }
    }
}