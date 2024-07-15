<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::factory()->create([
            'name' => 'Casa de Carnes Rainha',
            'email' => 'casa@rainha.com.br',
            'address' => 'Rua Independencia, 123',
        ]);

        Store::factory()->count(5)->create();
    }
}
