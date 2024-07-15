<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\Order;
use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conversation>
 */
class ConversationFactory extends Factory
{
    protected $model = Conversation::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'user_id' => User::factory(),
            'store_id' => Store::factory(),
        ];
    }
}
