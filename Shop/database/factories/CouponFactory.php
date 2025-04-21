<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement(['percentage', 'fixed']);
        $value = $type === 'percentage' 
            ? $this->faker->numberBetween(5, 50) 
            : $this->faker->randomFloat(2, 5, 50);
            
        return [
            'code' => strtoupper($this->faker->regexify('[A-Z]{3}[0-9]{3}')),
            'type' => $type,
            'value' => $value,
            'min_order_value' => $this->faker->boolean(60) ? $this->faker->randomFloat(2, 20, 100) : null,
            'max_uses' => $this->faker->boolean(70) ? $this->faker->numberBetween(10, 1000) : null,
            'used_times' => $this->faker->numberBetween(0, 50),
            'valid_from' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'valid_until' => $this->faker->dateTimeBetween('now', '+3 months'),
            'is_active' => $this->faker->boolean(80),
        ];
    }
    
    public function percentage(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'percentage',
                'value' => $this->faker->numberBetween(5, 50),
            ];
        });
    }
    
    public function fixed(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'fixed',
                'value' => $this->faker->randomFloat(2, 5, 50),
            ];
        });
    }
}