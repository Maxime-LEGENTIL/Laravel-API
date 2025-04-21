<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        $subtotal = $this->faker->randomFloat(2, 20, 500);
        $discount = $this->faker->randomFloat(2, 0, $subtotal * 0.2);
        $tax = ($subtotal - $discount) * 0.2; // TVA à 20%
        $total = $subtotal - $discount + $tax;
        
        return [
            'user_id' => User::factory(),
            'session_id' => $this->faker->md5(),
            'coupon_code' => $this->faker->boolean(30) ? $this->faker->word() . $this->faker->numberBetween(5, 25) : null,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'total' => $total,
            'abandoned_at' => $this->faker->boolean(30) ? $this->faker->dateTimeBetween('-1 month', 'now') : null,
            'is_guest' => $this->faker->boolean(20),
        ];
    }
    
    public function guest(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => null,
                'is_guest' => true,
            ];
        });
    }
}