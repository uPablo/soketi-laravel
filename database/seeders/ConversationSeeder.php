<?php

namespace Database\Seeders;

use App\Models\Conversation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conversation::factory()->create([
            'order_id' => 1,
            'user_id' => 1,
            'store_id' => 1,
        ]);

        Conversation::factory()->count(10)->create();
    }
}
