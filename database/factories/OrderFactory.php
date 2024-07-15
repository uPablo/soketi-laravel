<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'store_id' => \App\Models\Store::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
        ];
    }
}
