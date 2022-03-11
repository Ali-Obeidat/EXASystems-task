<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'merchant_name' => $this->faker->name(),
            'admin_id'=> User::factory()->make(),
            'created_at' => $this->faker->dateTimeBetween('-30 week', '+10 week'),

        ];
    }
}
