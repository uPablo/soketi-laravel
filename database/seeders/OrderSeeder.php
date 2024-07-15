<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory()->create([
            'user_id' => 1,
            'store_id' => 1,
            'status' => 'pending',
        ]);

        Order::factory()->count(20)->create();
    }
}
