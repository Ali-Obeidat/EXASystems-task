<?php

namespace Database\Factories;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'name' => $this->faker->name(),
            'merchant_id'=> Merchant::factory()->make(),
            'status' => 'in stoke',
            'price' => $this->faker->unique()->numberBetween(1,5000),
            'created_at' => $this->faker->dateTimeBetween('-30 week', '+10 week'),
        ];
    }
}
