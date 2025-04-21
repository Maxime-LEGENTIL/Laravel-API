<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        // Configuration pour la France
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Address($this->faker));
        
        return [
            'user_id' => User::factory(),
            'address_line1' => $this->faker->streetAddress(),
            'address_line2' => $this->faker->boolean(30) ? $this->faker->secondaryAddress() : null,
            'city' => $this->faker->city(),
            'state_province' => $this->faker->departmentName(),
            'postal_code' => $this->faker->postcode(),
            'country' => 'France',
            'phone_number' => $this->faker->phoneNumber(),
            'is_default' => $this->faker->boolean(40),
            'type' => $this->faker->randomElement(['billing', 'shipping', 'both']),
        ];
    }
    
    public function billing(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'billing',
            ];
        });
    }
    
    public function shipping(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'shipping',
            ];
        });
    }
}